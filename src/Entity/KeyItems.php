<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="are:Klicove_polozky",namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1",prefix="are")
 */
class KeyItems
{
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:ICO")
     */
    protected ?string $identificationNumber = NULL;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Rodne_cislo")
     */
    protected ?string $personalIdentificationNumber = NULL;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("are:Obchodni_firma")
     */
    protected ?string $businessName = NULL;

    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(?string $identificationNumber): KeyItems
    {
        $this->identificationNumber = $identificationNumber;
        return $this;
    }

    public function getPersonalIdentificationNumber(): ?string
    {
        return $this->personalIdentificationNumber;
    }

    public function setPersonalIdentificationNumber(?string $personalIdentificationNumber): KeyItems
    {
        $this->personalIdentificationNumber = $personalIdentificationNumber;
        return $this;
    }

    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    public function setBusinessName(?string $businessName): KeyItems
    {
        $this->businessName = $businessName;
        return $this;
    }

}