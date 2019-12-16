<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1",prefix="are")
 * @Serializer\XmlRoot(name="are:Zaznam", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
 */
class Record
{

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Shoda_ICO/dtt:Kod")
     */
    protected int $complianceIc;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Vyhledano_dle")
     */
    protected string $foundedBy;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Typ_registru/dtt:Kod")
     */
    protected int $registryTypeCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Typ_registru/dtt:Text")
     */
    protected string $registryTypeName;

    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Datum_vzniku")
     */
    protected \DateTimeImmutable $createdAt;

    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Datum_platnosti")
     */
    protected \DateTimeImmutable $expireAt;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Pravni_forma/dtt:Kod_PF")
     */
    protected int $legalFormCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Obchodni_firma")
     */
    protected string $companyName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:ICO")
     */
    protected string $ic;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:ID_adresy")
     */
    protected int $addressId;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Kod_statu")
     */
    protected int $countryCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Nazev_okresu")
     */
    protected string $district;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Nazev_obce")
     */
    protected string $municipality;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Nazev_casti_obce")
     */
    protected string $partOfMunicipality;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Nazev_mestske_casti")
     */
    protected ?string $cityDistrict = NULL;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Nazev_ulice")
     */
    protected ?string $street = NULL;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Cislo_domovni")
     */
    protected ?string $houseNumber = NULL;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Typ_cislo_domovni")
     */
    protected ?int $houseNumberType = NULL;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:Cislo_orientacni")
     */
    protected ?string $orientationNumber = NULL;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Identifikace/are:Adresa_ARES/dtt:PSC")
     */
    protected int $zipCode;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Kod_FU")
     */
    protected int $taxOfficeCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Priznaky_subjektu")
     */
    protected string $subjectFlag;

    public function getComplianceIc(): int
    {
        return $this->complianceIc;
    }

    public function getFoundedBy(): string
    {
        return $this->foundedBy;
    }

    public function getRegistryTypeCode(): int
    {
        return $this->registryTypeCode;
    }

    public function getRegistryTypeName(): string
    {
        return $this->registryTypeName;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getExpireAt(): \DateTimeImmutable
    {
        return $this->expireAt;
    }

    public function getLegalFormCode(): int
    {
        return $this->legalFormCode;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getIc(): string
    {
        return $this->ic;
    }

    public function getAddressId(): int
    {
        return $this->addressId;
    }

    public function getCountryCode(): int
    {
        return $this->countryCode;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function getMunicipality(): string
    {
        return $this->municipality;
    }

    public function getPartOfMunicipality(): string
    {
        return $this->partOfMunicipality;
    }

    public function getCityDistrict(): ?string
    {
        return $this->cityDistrict;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function getHouseNumberType(): int
    {
        return $this->houseNumberType;
    }

    public function getOrientationNumber(): ?string
    {
        return $this->orientationNumber;
    }

    public function getZipCode(): int
    {
        return $this->zipCode;
    }

    public function getTaxOfficeCode(): int
    {
        return $this->taxOfficeCode;
    }

    public function getSubjectFlag(): string
    {
        return $this->subjectFlag;
    }

}