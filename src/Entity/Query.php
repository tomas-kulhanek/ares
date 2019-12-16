<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="are:Dotaz",namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1",prefix="are")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.1", prefix="v1")
 */
class Query
{

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Pomocne_ID")
     */
    protected int $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Typ_vyhledani")
     */
    protected string $searchType = 'free';
    /**
     * @var KeyItems
     * @Serializer\Type("HelpPC\Ares\Entity\KeyItems")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Klicove_polozky")
     */
    protected KeyItems $keyItems;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Nazev_obce")
     */
    protected ?string $city = NULL;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Pravni_forma")
     */
    protected ?int $legalForm = NULL;
    /**
     * @var \DateTimeImmutable
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("DateTimeImmutable<'Y-m-d','Europe/Prague'>")
     * @Serializer\SerializedName("are:Datum_platnosti")
     */
    protected \DateTimeImmutable $expirationDate;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Typ_registru/v:Kod")
     */
    protected ?int $codeOfRegistryType = NULL;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Typ_registru/v:Text")
     */
    protected ?string $textOfRegisterType = NULL;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Max_pocet")
     */
    protected int $maxRecord = 10;
    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Diakritika")
     */
    protected bool $diacritics = TRUE;
    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Aktivni")
     */
    protected bool $active = TRUE;
    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Adr_puv")
     */
    protected bool $adrPuv = FALSE;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Query
    {
        $this->id = $id;
        return $this;
    }

    public function getSearchType(): string
    {
        return $this->searchType;
    }

    public function setSearchType(string $searchType): Query
    {
        $this->searchType = $searchType;
        return $this;
    }

    public function getKeyItems(): KeyItems
    {
        return $this->keyItems;
    }

    public function setKeyItems(KeyItems $keyItems): Query
    {
        $this->keyItems = $keyItems;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): Query
    {
        $this->city = $city;
        return $this;
    }

    public function getLegalForm(): ?int
    {
        return $this->legalForm;
    }

    public function setLegalForm(?int $legalForm): Query
    {
        $this->legalForm = $legalForm;
        return $this;
    }

    public function getExpirationDate(): \DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeImmutable $expirationDate): Query
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getCodeOfRegistryType(): ?int
    {
        return $this->codeOfRegistryType;
    }

    public function setCodeOfRegistryType(?int $codeOfRegistryType): Query
    {
        $this->codeOfRegistryType = $codeOfRegistryType;
        return $this;
    }

    public function getTextOfRegisterType(): ?string
    {
        return $this->textOfRegisterType;
    }

    public function setTextOfRegisterType(?string $textOfRegisterType): Query
    {
        $this->textOfRegisterType = $textOfRegisterType;
        return $this;
    }

    public function getMaxRecord(): int
    {
        return $this->maxRecord;
    }

    public function setMaxRecord(int $maxRecord): Query
    {
        $this->maxRecord = $maxRecord;
        return $this;
    }

    public function isDiacritics(): bool
    {
        return $this->diacritics;
    }

    public function setDiacritics(bool $diacritics): Query
    {
        $this->diacritics = $diacritics;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): Query
    {
        $this->active = $active;
        return $this;
    }

    public function isAdrPuv(): bool
    {
        return $this->adrPuv;
    }

    public function setAdrPuv(bool $adrPuv): Query
    {
        $this->adrPuv = $adrPuv;
        return $this;
    }


}