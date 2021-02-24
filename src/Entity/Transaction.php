<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompteAgencePartenaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompteAgencePartenaireRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeTransaction;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\Column(type="date")
     */
    private $dateTransaction;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $part_etat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $part_systeme;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $part_user_depot;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $part_user_retrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=AdminSystem::class, inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurAP;

    /**
     * @ORM\ManyToOne(targetEntity=CompteAgencePartenaire::class, inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteAP;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCodeTransaction(): ?string
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(string $codeTransaction): self
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->dateTransaction;
    }

    public function setDateTransaction(\DateTimeInterface $dateTransaction): self
    {
        $this->dateTransaction = $dateTransaction;

        return $this;
    }

    public function getPartEtat(): ?float
    {
        return $this->part_etat;
    }

    public function setPartEtat(?float $part_etat): self
    {
        $this->part_etat = $part_etat;

        return $this;
    }

    public function getPartSysteme(): ?float
    {
        return $this->part_systeme;
    }

    public function setPartSysteme(?float $part_systeme): self
    {
        $this->part_systeme = $part_systeme;

        return $this;
    }

    public function getPartUserDepot(): ?float
    {
        return $this->part_user_depot;
    }

    public function setPartUserDepot(?float $part_user_depot): self
    {
        $this->part_user_depot = $part_user_depot;

        return $this;
    }

    public function getPartUserRetrait(): ?float
    {
        return $this->part_user_retrait;
    }

    public function setPartUserRetrait(?float $part_user_retrait): self
    {
        $this->part_user_retrait = $part_user_retrait;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUtilisateurAP(): ?AdminSystem
    {
        return $this->utilisateurAP;
    }

    public function setUtilisateurAP(?AdminSystem $utilisateurAP): self
    {
        $this->utilisateurAP = $utilisateurAP;

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
