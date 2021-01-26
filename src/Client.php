<?php declare(strict_types=1);

namespace HelpPC\Ares;

use Exception;
use HelpPC\Ares\Entity\AresQuery;
use HelpPC\Ares\Entity\Response\AresResponse;
use HelpPC\Ares\Exception\EmptyRequestException;
use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Client
{

    private const WEBSERVICE_URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/xar.cgi';

    private SerializerInterface $serializer;
    private HttpClientInterface $httpClient;

    public function __construct(SerializerInterface $serializer, HttpClientInterface $httpClient)
    {
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
    }


    private function getXmlDocument(?string $xmlContent = null): \DOMDocument
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        if ($xmlContent !== null) {
            $document->loadXML($xmlContent);
            return $document;
        }
        $document->loadXML('<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Header/><SOAP-ENV:Body></SOAP-ENV:Body></SOAP-ENV:Envelope>');
        return $document;
    }

    private function getValueByXpath(\DOMDocument $document, string $xpath): ?string
    {
        $domXpath = new \DOMXPath($document);
        $result = null;
        $res = $domXpath->evaluate($xpath);
        if ($res instanceof \DOMNodeList) {
            foreach ($res as $node) {
                if ($node instanceof \DOMElement || $node instanceof \DOMDocument) {
                    $nodeValue = null;
                    $children = $node->childNodes;
                    foreach ($children as $child) {
                        $nodeValue .= $document->saveXML($child);
                    }
                } else {
                    $nodeValue = $node->nodeValue;
                }
                $result .= $nodeValue;
            }
        }
        return $result;
    }

    public function send(AresQuery $request): AresResponse
    {
        if (!$request->isValid()) {
            throw new EmptyRequestException();
        }
        $request = $this->serializer->serialize($request, 'xml');
        $request = $this->getXmlDocument($request);

        $requestDocument = $this->getXmlDocument();
        $requestDocumentXpath = new \DOMXPath($requestDocument);

        if (!$requestDocument->documentElement) {
            throw new Exception();
        }

        $bodyNode = $requestDocumentXpath->evaluate('//' . $requestDocument->documentElement->prefix . ':Body');
        $new = $bodyNode[0]->ownerDocument->importNode($request->documentElement, true);
        if ($bodyNode[0]->nextSibling) {
            $bodyNode[0]->insertBefore($new, $bodyNode[0]->nextSibling);
        } else {
            $bodyNode[0]->appendChild($new);
        }

        $headers = [
            'Connection' => 'Keep-Alive',
            'Accept-Encoding' => 'gzip,deflate',
            'Content-Type' => 'text/xml; charset=utf-8',
            'SOAPAction' => '""',

        ];

        $requestOptions = [
            'headers' => [
                'Connection' => 'Keep-Alive',
                'Accept-Encoding' => 'gzip,deflate',
                'Content-Type' => 'text/xml; charset=utf-8',
                'SOAPAction' => '""',
            ],
            'body' => $requestDocument->saveXml(),
        ];

        $response = $this->httpClient->request('POST', self::WEBSERVICE_URL, $requestOptions);

        $soapResponse = $this->getXmlDocument($response->getContent());

        if (!$soapResponse->documentElement) {
            throw new Exception();
        }
        $clearXml = $this->getValueByXpath($soapResponse, '//' . $soapResponse->documentElement->prefix . ':Body');
        if (empty($clearXml)) {
            throw new Exception();
        }
        
        return $this->serializer->deserialize($clearXml, AresResponse::class, 'xml');
    }
}