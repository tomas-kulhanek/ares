<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer_basic/v_1.0.3",prefix="are")
 * @Serializer\XmlRoot(name="are:Ares_odpovedi", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer_basic/v_1.0.3")
 */
class AresResponse
{

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s','Europe/Prague'>")
     * @Serializer\SerializedName("odpoved_datum_cas")
     */
    protected \DateTimeImmutable $responseDateTime;

    /**
     * @Serializer\Type("int")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dotaz_pocet")
     */
    protected int $queryCount = 0;

    /**
     * @Serializer\XmlAttribute
     * @Serializer\Type("string")
     * @Serializer\SerializedName("odpoved_typ")
     */
    protected string $responseType = 'Basic';

    /**
     * @Serializer\XmlAttribute
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    protected string $requestId;

    /**
     * @var Response[]
     * @Serializer\Type("array<HelpPC\Ares\Entity\Response\Response>")
     * @Serializer\XmlList(inline=true, entry="are:Odpoved")
     */
    protected array $response =[];

    /**
     * @return Response[]
     */
    public function getResponse(): array
    {
        return $this->response;
    }

}