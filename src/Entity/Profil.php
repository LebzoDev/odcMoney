<?php

namespace App\Entity;

use App\Entity\AdminSystem;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 */
class Profil
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
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $archive;

    /**
     * @ORM\OneToMany(targetEntity=AdminSystem::class, mappedBy="profil")
     */
    private $adminSystems;

    public function __construct()
    {
        $this->adminSystems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * @return Collection|AdminSystem[]
     */
    public function getAdminSystems(): Collection
    {
        return $this->adminSystems;
    }

    public function addAdminSystem(AdminSystem $adminSystem): self
    {
        if (!$this->adminSystems->contains($adminSystem)) {
            $this->adminSystems[] = $adminSystem;
            $adminSystem->setProfil($this);
        }

        return $this;
    }

    public function removeAdminSystem(AdminSystem $adminSystem): self
    {
        if ($this->adminSystems->removeElement($adminSystem)) {
            // set the owning side to null (unless already changed)
            if ($adminSystem->getProfil() === $this) {
                $adminSystem->setProfil(null);
            }
        }

        return $this;
    }
}
