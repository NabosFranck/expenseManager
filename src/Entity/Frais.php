<?php

namespace App\Entity;

use App\Entity\Client;
use App\Entity\Commercial;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FraisRepository;
use App\Repository\CommercialRepository;


/**
 * @ORM\Entity(repositoryClass=FraisRepository::class)
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
     * @ORM\ManyToOne(targetEntity=Commercial::class, inversedBy="frais")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commercial;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="frais")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    /**
     * @ORM\Column(type="blob")
     */
    private $justificatifs;

    
   
    

    

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

    public function getJustificatifs()
    {
        return $this->justificatifs;
    }

    public function setJustificatifs($justificatifs): self
    {
        $this->justificatifs = $justificatifs;

        return $this;
    }

  
    
 

}
