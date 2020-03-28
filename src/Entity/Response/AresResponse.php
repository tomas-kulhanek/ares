<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer_basic/v_1.0.3",prefix="are")
 * @Serializer\XmlRoot(name="are:Ares_odpovedi", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer_basic/v_1.0.3")
 */
class AresResponse
{

    /**
     * @var \DateTimeImmutable
     * @Serializer\XmlAttribute()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s','Europe/Prague'>")
     * @Serializer\SerializedName("odpoved_datum_cas")
     */
    protected \DateTimeImmutable $responseDateTime;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dotaz_pocet")
     */
    protected int $queryCount = 0;
    /**
     * @var string
     * @Serializer\XmlAttribute
     * @Serializer\Type("string")
     * @Serializer\SerializedName("odpoved_typ")
     */
    protected string $responseType = 'Basic';
    /**
     * @var string
     * @Serializer\XmlAttribute
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    protected string $requestId;

    /**
     * @var Collection<int, Response>
     * @Serializer\Type("ArrayCollection<HelpPC\Ares\Entity\Response\Response>")
     * @Serializer\XmlList(inline=true, entry="are:Odpoved")
     */
    protected Collection $response;

    /**
     * @return Collection<int, Response>
     */
    public function getResponse(): Collection
    {
        return $this->response;
    }

    public function __construct()
    {
        $this->response = new ArrayCollection();
    }

}