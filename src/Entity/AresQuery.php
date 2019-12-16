<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="are:Ares_dotazy",namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1",prefix="are")
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
    protected string $queryType = 'Standard';
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
    protected string $requestId = 'ares_dotaz';

    /**
     * @var Collection<int, Query>
     * @Serializer\XmlList(inline = true, entry = "are:Dotaz")
     */
    protected Collection $queries;

    public function __construct(string $applicantsEmail)
    {
        $this->applicantsEmail = $applicantsEmail;
        $this->queries = new ArrayCollection();
        $this->queryDateTime = new \DateTimeImmutable();
        $this->queryCount = 0;
    }

    public function addQuery(Query $query): AresQuery
    {
        $this->queries->add($query);
        $this->queryCount++;
        return $this;
    }
}