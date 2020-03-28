<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;


/**
 * @Serializer\XmlRoot(name="are:Odpoved", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer_basic/v_1.0.3")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer_basic/v_1.0.3", prefix="are")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.3", prefix="D")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/uvis_datatypes/v_1.0.3", prefix="U")
 */
class Response
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("D:PID")
     */
    protected int $id;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:VBAS/D:ICO")
     */
    protected string $identificationNumber;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:VBAS/D:DIC")
     */
    protected ?string $vatNumber = NULL;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:VBAS/D:OF")
     */
    protected string $companyName;
    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d','Europe/Prague'>")
     * @Serializer\SerializedName("D:VBAS/D:DV")
     */
    protected \DateTimeImmutable $creationDate;
    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("D:VBAS/D:PF/D:KPF")
     */
    protected int $subjectTypeCode;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:VBAS/D:PF/D:NPF")
     */
    protected string $subjectType;
    /**
     * @Serializer\Type("HelpPC\Ares\Entity\Response\Address")
     * @Serializer\SerializedName("D:VBAS/D:AA")
     */
    protected ?Address $address = NULL;
    /**
     * @Serializer\Type("HelpPC\Ares\Entity\Response\TradeRegister")
     * @Serializer\SerializedName("D:VBAS/D:RRZ")
     */
    protected ?TradeRegister $tradeRegister = NULL;

    /**
     * @var Collection<int, Specialization>
     * @Serializer\Type("ArrayCollection<HelpPC\Ares\Entity\Response\Specialization>")
     * @Serializer\XmlList(inline=true, entry="D:VBAS/D:Obory_cinnosti/child::*")
     */
    protected Collection $specialization;

    public function __construct()
    {
        $this->specialization = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdentificationNumber(): string
    {
        return $this->identificationNumber;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getCreationDate(): \DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function getSubjectTypeCode(): int
    {
        return $this->subjectTypeCode;
    }

    public function getSubjectType(): string
    {
        return $this->subjectType;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function getTradeRegister(): ?TradeRegister
    {
        return $this->tradeRegister;
    }

    /**
     * @return Collection<int, Specialization>
     */
    public function getSpecialization(): Collection
    {
        return $this->specialization;
    }
}