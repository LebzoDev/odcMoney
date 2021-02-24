<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgencePartenaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AgencePartenaireRepository::class)
 */
class AgencePartenaire
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
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\OneToOne(targetEntity=CompteAgencePartenaire::class, mappedBy="agencePartenaireAssociee", cascade={"persist", "remove"})
     */
    private $compteAgencePartenaire;

    /**
     * @ORM\OneToMany(targetEntity=AdminSystem::class, mappedBy="agencePartenaire")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCompteAgencePartenaire(): ?CompteAgencePartenaire
    {
        return $this->compteAgencePartenaire;
    }

    public function setCompteAgencePartenaire(CompteAgencePartenaire $compteAgencePartenaire): self
    {
        // set the owning side of the relation if necessary
        if ($compteAgencePartenaire->getAgencePartenaireAssociee() !== $this) {
            $compteAgencePartenaire->setAgencePartenaireAssociee($this);
        }

        $this->compteAgencePartenaire = $compteAgencePartenaire;

        return $this;
    }

    /**
     * @return Collection|AdminSystem[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(AdminSystem $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setAgencePartenaire($this);
        }

        return $this;
    }

    public function removeUtilisateur(AdminSystem $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getAgencePartenaire() === $this) {
                $utilisateur->setAgencePartenaire(null);
            }
        }

        return $this;
    }
}
