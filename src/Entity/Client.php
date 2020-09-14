<?php

namespace App\Entity;

use App\Entity\Frais;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FraisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommercialRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @ApiResource
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity=Frais::class, mappedBy="client")
     * @ORM\JoinColumn(nullable=true)
     */
    private $frais;

    
    public function __construct()
    {
        $this->frais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * @return Collection|Frais[]
     */
    public function getFrais(): Collection
    {
        return $this->frais;
    }

    public function addFrai(Frais $frai): self
    {
        if (!$this->frais->contains($frai)) {
            $this->frais[] = $frai;
            $frai->setClient($this);
        }
        return $this;
    }

    public function removeFrai(Frais $frai): self
    {
        if ($this->frais->contains($frai)) {
            $this->frais->removeElement($frai);
            // set the owning side to null (unless already changed)
            if ($frai->getClient() === $this) {
                $frai->setClient(null);
            }
        }
        return $this;
    }

    public function __toString(){
       return $this->societe;
    }
    
}
