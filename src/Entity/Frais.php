<?php

namespace App\Entity;

use DateTime;
use App\Entity\Client;
use DateTimeInterface;
use App\Entity\Commercial;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FraisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommercialRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FraisRepository::class)
 * @ApiResource
 */
class Frais
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("frais:read")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("frais:read")
     * 
     */
    private $etat;

    /**
     * @ORM\Column(type="float")
     * @Groups("frais:read")
     */
    private $trajet;

    /**
     * @ORM\Column(type="float")
     * @Groups("frais:read")
     */
    private $nuit;

    /**
     * @ORM\Column(type="float")
     * @Groups("frais:read")
     */
    private $repas;

    /**
     * @ORM\ManyToOne(targetEntity=Commercial::class, inversedBy="frais")
     * @Groups("frais:read")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commercial;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="frais")
     * @Groups("frais:read")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    /**
     * @ORM\Column(type="string")
     * @Groups("frais:read")
     */
    private $justificatifs;


    /**
     * @ORM\Column(type="datetime")
     * @Groups("frais:read")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("frais:read")
     */
    private $updatedAt;

    public function __construct(){
        $this->createdAt = new \Datetime();
        $this->updatedAt = new \Datetime();
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


    public function getCommercial(): ?commercial
    {
        return $this->commercial;
    }

    public function setCommercial(?commercial $commercial): self
    {
        $this->commercial = $commercial;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getJustificatifs(): ?string
    {
        return $this->justificatifs;
    }

    public function setJustificatifs(?string $justificatifs): self
    {
        $this->justificatifs = $justificatifs;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    
}
