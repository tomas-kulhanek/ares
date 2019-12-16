<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="are:Error")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1",prefix="are")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_datatypes/v_1.0.4", prefix="dtt")
 */
class Error
{

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("dtt:Error_kod")
     */
    protected $errorCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("dtt:Error_text")
     */
    protected $errorText;

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function getErrorText(): string
    {
        return $this->errorText;
    }

}