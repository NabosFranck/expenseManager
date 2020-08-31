<?php

namespace App\Entity;

use App\Entity\Commercial;
use App\Repository\CommercialRepository;
use App\Repository\FraisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=FraisRepository::class)
 * @Vich\Uploadable
 */
class Frais
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\Column(type="float")
     */
    private $trajet;

    /**
     * @ORM\Column(type="float")
     */
    private $nuit;

    /**
     * @ORM\Column(type="float")
     */
    private $repas;

    /**
     * @ORM\Column(type="blob")
     *  @Vich\UploadableField(mapping="justificatif", fileNameProperty="justifName", size="justifSize")
     * @var File|null
     */
    private $justificatifs;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $justifName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int|null
     */
    private $justifSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Commercial::class, inversedBy="frais")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commercial;

    public function setJustificatifs(?File $justificatifs = null): void
    {
        $this->justificatifs = $justificatifs;

        if (null !== $justificatifs) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function setJustifName(?string $justifName): void
    {
        $this->justifName = $justifName;
    }

    public function getJustifName(): ?string
    {
        return $this->justifName;
    }

    public function setJustifSize(?int $justifSize): void
    {
        $this->justifSize = $justifSize;
    }

    public function getJustifSize(): ?int
    {
        return $this->justifSize;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTrajet(): ?float
    {
        return $this->trajet;
    }

    public function setTrajet(float $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getNuit(): ?float
    {
        return $this->nuit;
    }

    public function setNuit(float $nuit): self
    {
        $this->nuit = $nuit;

        return $this;
    }

    public function getRepas(): ?float
    {
        return $this->repas;
    }

    public function setRepas(float $repas): self
    {
        $this->repas = $repas;

        return $this;
    }

    public function getJustificatifs()
    {
        return $this->justificatifs;
    }


    public function getCommercial(): ?commercial
    {
        return $this->commercial;
    }

    public function setCommercial(?commercial $commercial): self
    {
        $this->commercial = $commercial;

        return $this;
    }
    
 

}
