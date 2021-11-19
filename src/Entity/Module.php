<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getDatedebutModule()
    {
        return $this->datedebutModule;
    }

    /**
     * @param mixed $datedebutModule
     */
    public function setDatedebutModule($datedebutModule): void
    {
        $this->datedebutModule = $datedebutModule;
    }

    /**
     * @return mixed
     */
    public function getDatefinModule()
    {
        return $this->datefinModule;
    }

    /**
     * @param mixed $datefinModule
     */
    public function setDatefinModule($datefinModule): void
    {
        $this->datefinModule = $datefinModule;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreModule;

    /**
     * @ORM\Column(name="dateDebut_module", type="date", nullable=false)
     */
    private $datedebutModule;

    /**
     * @ORM\Column(name="dateFin_module", type="date", nullable=false)
     */
    private $datefinModule;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="module")
     */
    private $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreModule(): ?string
    {
        return $this->titreModule;
    }

    public function setTitreModule(string $titreModule): self
    {
        $this->titreModule = $titreModule;

        return $this;
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->setModule($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getModule() === $this) {
                $tach->setModule(null);
            }
        }

        return $this;
    }
}
