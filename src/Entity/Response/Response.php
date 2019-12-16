<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;


/**
 * @Serializer\XmlRoot(name="are:Odpoved")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1",prefix="are")
 */
class Response
{

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Pomocne_ID")
     */
    protected int $id;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Pocet_zaznamu")
     */
    protected int $recordCount;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Typ_vyhledani")
     */
    protected string $searchType;

    /**
     * @var Record[]
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("array<HelpPC\Ares\Entity\Response\Record>")
     * @Serializer\XmlList(entry="Zaznam", inline=true, namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
     * @Serializer\XmlElement(cdata=false,namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
     */
    protected array $responseData;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Record[]
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }
}
