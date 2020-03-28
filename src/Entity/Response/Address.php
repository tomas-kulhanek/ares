<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;
use function GuzzleHttp\Psr7\str;

/**
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.3",prefix="D")
 * @Serializer\XmlRoot(name="D:AA", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.3")
 */
class Address
{
    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("D:IDA")
     */
    protected int $id;
    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("D:KS")
     */
    protected int $countryCode;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:NS")
     */
    protected string $country;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:NOK")
     */
    protected ?string $district = NULL;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:N")
     */
    protected string $city;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:NCO")
     */
    protected ?string $cityPart = NULL;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:NMC")
     */
    protected ?string $cityDistrict = NULL;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:NU")
     */
    protected ?string $street = NULL;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:CD")
     */
    protected ?string $descriptiveNumber = NULL;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:CO")
     */
    protected ?string $orientationNumber = NULL;
    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("D:PSC")
     */
    protected int $zipCode;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountryCode(): int
    {
        return $this->countryCode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getDistrict(): ?string
    {
        return $this->district;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCityPart(): ?string
    {
        return $this->cityPart;
    }

    public function getCityDistrict(): ?string
    {
        return $this->cityDistrict;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getDescriptiveNumber(): ?string
    {
        return $this->descriptiveNumber;
    }

    public function getOrientationNumber(): ?string
    {
        return $this->orientationNumber;
    }

    public function getZipCode(): int
    {
        return $this->zipCode;
    }

}