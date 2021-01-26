<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

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
     * @var Specialization[]
     * @Serializer\Type("array<HelpPC\Ares\Entity\Response\Specialization>")
     * @Serializer\XmlList(inline=true, entry="D:VBAS/D:Obory_cinnosti/child::*")
     */
    protected array $specialization = [];

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
     * @return Specialization[]
     */
    public function getSpecialization(): array
    {
        return $this->specialization;
    }
}