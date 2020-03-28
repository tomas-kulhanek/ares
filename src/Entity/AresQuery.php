<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="v:Ares_dotazy",namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_request_orrg/v_1.0.0")
 */
class AresQuery
{
    /**
     * @var \DateTimeImmutable
     * @Serializer\XmlAttribute()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s','Europe/Prague'>")
     * @Serializer\SerializedName("dotaz_datum_cas")
     */
    protected \DateTimeImmutable $queryDateTime;
    /**
     * @var int
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dotaz_pocet")
     */
    protected int $queryCount;
    /**
     * @var string
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dotaz_typ")
     */
    protected string $queryType = 'Basic';
    /**
     * @var string
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("vystup_format")
     */
    protected string $answerType = 'xml';
    /**
     * @var string
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("user_mail")
     */
    protected string $applicantsEmail;
    /**
     * @var string
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("Id")
     */
    protected string $requestId = 'ares';

    /**
     * @var Query[]
     * @Serializer\XmlList(inline = true, entry = "Dotaz")
     */
    protected array $queries = [];

    public function __construct(string $applicantsEmail)
    {
        $this->applicantsEmail = $applicantsEmail;
        $this->queryDateTime = new \DateTimeImmutable();
        $this->queryCount = 0;
    }

    public function isValid(): bool
    {
        return count($this->queries) > 0;
    }

    public function addQuery(Query $query): AresQuery
    {
        $this->queries[] = $query;
        $this->queryCount = count($this->queries);
        return $this;
    }
}