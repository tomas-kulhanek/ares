<?php declare(strict_types=1);

namespace HelpPC\Ares\Entity;

use HelpPC\Ares\Exception\InvalidFormatException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="Dotaz")
 */
class Query
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Pomocne_ID")
     */
    protected int $id;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ICO")
     */
    protected string $identificationNumber;
    /**
     * @var \DateTimeImmutable
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("DateTimeImmutable<'Y-m-d','Europe/Prague'>")
     * @Serializer\SerializedName("Datum_platnosti")
     * @Serializer\SkipWhenEmpty()
     */
    protected ?\DateTimeImmutable $expirationDate = NULL;
    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Aktivni")
     * @Serializer\SkipWhenEmpty()
     */
    protected bool $active = TRUE;
    /**
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Klic_ARES")
     */
    private ?int $aresKey = NULL;
    /**
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ID_vety")
     */
    private ?int $sentencesId = NULL;
    /**
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Rozsah")
     * @Serializer\SkipWhenEmpty()
     */
    private ?int $range = NULL;
    /**
     * @var bool
     * @Serializer\Type("boolean")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Adr_puv")
     * @Serializer\SkipWhenEmpty()
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

    public function getIdentificationNumber(): string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(string $identificationNumber): Query
    {
        $this->checkIdentificationNumber($identificationNumber);
        $this->identificationNumber = $identificationNumber;
        return $this;
    }

    public function getExpirationDate(): ?\DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeImmutable $expirationDate): Query
    {
        $this->expirationDate = $expirationDate;
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

    public function getAresKey(): ?int
    {
        return $this->aresKey;
    }

    public function setAresKey(?int $aresKey): Query
    {
        $this->aresKey = $aresKey;
        return $this;
    }

    public function getSentencesId(): ?int
    {
        return $this->sentencesId;
    }

    public function setSentencesId(?int $sentencesId): Query
    {
        $this->sentencesId = $sentencesId;
        return $this;
    }

    public function getRange(): ?int
    {
        return $this->range;
    }

    public function setRange(?int $range): Query
    {
        $this->range = $range;
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

    private function checkIdentificationNumber(string $identificationNumber): bool
    {
        $identificationNumber = str_pad($identificationNumber, 8, '0', STR_PAD_LEFT);

// be liberal in what you receive
        $ic = \preg_replace('#\s+#', '', $identificationNumber);

        // má požadovaný tvar?
        if (!\preg_match('#^\d{8}$#', $identificationNumber)) {
            throw new InvalidFormatException('Identification number doesn\`t have valid format.');
        }

        // kontrolní součet
        $a = 0;

        for ($i = 0; $i < 7; ++$i) {
            $a += (int) $identificationNumber[$i] * (8 - $i);
        }

        $a %= 11;

        if (0 === $a) {
            $c = 1;
        } elseif (1 === $a) {
            $c = 0;
        } else {
            $c = 11 - $a;
        }

        if (!((int) $identificationNumber[7] === $c)) {
            throw new InvalidFormatException('Identification number is not valid.');
        }
        return TRUE;
    }

}