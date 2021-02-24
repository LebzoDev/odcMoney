<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DepotRepository::class)
 */
class Depot
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
    private $numeroDepot;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity=AdminSystem::class, inversedBy="depots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $caissier;

    /**
     * @ORM\ManyToOne(targetEntity=CompteAgencePartenaire::class, inversedBy="depots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteAP;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDepot(): ?string
    {
        return $this->numeroDepot;
    }

    public function setNumeroDepot(string $numeroDepot): self
    {
        $this->numeroDepot = $numeroDepot;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCaissier(): ?AdminSystem
    {
        return $this->caissier;
    }

    public function setCaissier(?AdminSystem $caissier): self
    {
        $this->caissier = $caissier;

        return $this;
    }

    public function getCompteAP(): ?CompteAgencePartenaire
    {
        return $this->compteAP;
    }

    public function setCompteAP(?CompteAgencePartenaire $compteAP): self
    {
        $this->compteAP = $compteAP;

        return $this;
    }
}
