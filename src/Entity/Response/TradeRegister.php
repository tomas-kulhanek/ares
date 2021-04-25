<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.3",prefix="D")
 * @Serializer\XmlRoot(name="D:RRZ", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.3")
 */
class TradeRegister
{
    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("D:ZU/D:KZU")
     */
    protected ?int $licensingOfficeId = NULL;
    
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:ZU/D:NZU")
     */
    protected ?string $licensingOffice = NULL;
    
    /**
     * @Serializer\Type("int")
     * @Serializer\SerializedName("D:FU/D:KFU")
     */
    protected ?int $taxOfficeId = NULL;
    
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:FU/D:NFU")
     */
    protected ?string $taxOffice = NULL;
    
    public function getLicensingOfficeId(): ?int
    {
        return $this->licensingOfficeId;
    }

    public function getLicensingOffice(): ?string
    {
        return $this->licensingOffice;
    }

    public function getTaxOfficeId(): ?int
    {
        return $this->taxOfficeId;
    }

    public function getTaxOffice(): ?string
    {
        return $this->taxOffice;
    }

}
