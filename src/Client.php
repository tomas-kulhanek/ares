<?php declare(strict_types=1);

namespace HelpPC\Ares;

use HelpPC\Ares\Entity\AresQuery;
use HelpPC\Ares\Entity\Response\AresResponse;
use HelpPC\Ares\Exception\EmptyRequestException;
use JMS\Serializer\SerializerInterface;

class Client
{

    private const WEBSERVICE_URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/xar.cgi';

    private \GuzzleHttp\Client $guzzleHttp;
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer, \GuzzleHttp\Client $guzzleHttp)
    {
        $this->guzzleHttp = $guzzleHttp;
        $this->serializer = $serializer;
    }


    private function getXmlDocument(?string $xmlContent = NULL): \DOMDocument
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        if ($xmlContent !== NULL) {
            $document->loadXML($xmlContent);
            return $document;
        }
        $document->loadXML('<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Header/><SOAP-ENV:Body></SOAP-ENV:Body></SOAP-ENV:Envelope>');
        return $document;
    }

    private function getValueByXpath(\DOMDocument $document, string $xpath): ?string
    {
        $domXpath = new \DOMXPath($document);
        $result = NULL;
        $res = $domXpath->evaluate($xpath);
        if ($res instanceof \DOMNodeList) {
            foreach ($res as $node) {
                if ($node instanceof \DOMElement || $node instanceof \DOMDocument) {
                    $nodeValue = NULL;
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

        $bodyNode = $requestDocumentXpath->evaluate('//' . $requestDocument->documentElement->prefix . ':Body');
        $new = $bodyNode[0]->ownerDocument->importNode($request->documentElement, TRUE);
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
        $curl = [];
        $curl[CURLOPT_TIMEOUT] = 60 * 2;
        $curl[CURLOPT_CONNECTTIMEOUT] = 6;

        $response = $this->guzzleHttp->post(self::WEBSERVICE_URL, ['curl' => $curl, 'headers' => $headers, 'body' => $requestDocument->saveXML()]);

        $soapResponse = $this->getXmlDocument(
            $response->getBody()->getContents()
        );

        return $this->serializer->deserialize(
            $this->getValueByXpath($soapResponse, '//' . $soapResponse->documentElement->prefix . ':Body'),
            AresResponse::class, 'xml'
        );
    }


}