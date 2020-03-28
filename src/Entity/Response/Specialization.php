<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="D:Obor_cinnosti", namespace="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1")
 * @Serializer\XmlNamespace(uri="http://wwwinfo.mfcr.cz/ares/xml_doc/schemas/ares/ares_answer/v_1.0.1", prefix="D")
 */
class Specialization
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:K")
     */
    protected string $code;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("D:T")
     */
    protected string $name;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

}