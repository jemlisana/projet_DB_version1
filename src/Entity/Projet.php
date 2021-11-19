<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
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
    private $titre;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut_projet;

    /**
     * @ORM\Column(name="dateFin_projet", type="date", nullable=false)
     */
    private $datefinProjet;

    /**
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(name="etat_projet", type="string", length=50, nullable=false)
     */
    private $etatProjet;

    /**
     * @ORM\ManyToOne(targetEntity=utilisateur::class, inversedBy="admin_projets")
     */
    private $admin;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     */
    private $chef_projet;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="projet")
     */
    private $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDateDebutProjet()
    {
        return $this->dateDebut_projet;
    }

    /**
     * @param mixed $dateDebut_projet
     */
    public function setDateDebutProjet($dateDebut_projet): void
    {
        $this->dateDebut_projet = $dateDebut_projet;
    }

    /**
     * @return mixed
     */
    public function getDatefinProjet()
    {
        return $this->datefinProjet;
    }

    /**
     * @param mixed $datefinProjet
     */
    public function setDatefinProjet($datefinProjet): void
    {
        $this->datefinProjet = $datefinProjet;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEtatProjet()
    {
        return $this->etatProjet;
    }

    /**
     * @param mixed $etatProjet
     */
    public function setEtatProjet($etatProjet): void
    {
        $this->etatProjet = $etatProjet;
    }

    public function getAdmin(): ?utilisateur
    {
        return $this->admin;
    }

    public function setAdmin(?utilisateur $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getChefProjet(): ?Utilisateur
    {
        return $this->chef_projet;
    }

    public function setChefProjet(?Utilisateur $chef_projet): self
    {
        $this->chef_projet = $chef_projet;

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
            $tach->setProjet($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getProjet() === $this) {
                $tach->setProjet(null);
            }
        }

        return $this;
    }

}
