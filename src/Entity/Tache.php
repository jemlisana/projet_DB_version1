<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 */
class Tache
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
    private $titreTache;

    /**
     * @ORM\Column(name="dateDebut_tache", type="date", nullable=false)
     */
    private $datedebutTache;

    /**
     * @ORM\Column(name="dateFin_tache", type="date", nullable=false)
     */
    private $datefinTache;

    /**
     * @ORM\Column(name="priorite", type="integer", nullable=false)
     */
    private $priorite;

    /**
     * @ORM\Column(name="etat_tache", type="string", length=50, nullable=false)
     */
    private $etatTache;

    /**
     * @ORM\Column(name="taux_avancement", type="float", precision=10, scale=0, nullable=false)
     */
    private $tauxAvancement;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="taches")
     */
    private $membre_equipe;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="taches")
     */
    private $projet;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="taches")
     */
    private $module;

    /**
     * @return mixed
     */
    public function getDatedebutTache()
    {
        return $this->datedebutTache;
    }

    /**
     * @param mixed $datedebutTache
     */
    public function setDatedebutTache($datedebutTache): void
    {
        $this->datedebutTache = $datedebutTache;
    }

    /**
     * @return mixed
     */
    public function getDatefinTache()
    {
        return $this->datefinTache;
    }

    /**
     * @param mixed $datefinTache
     */
    public function setDatefinTache($datefinTache): void
    {
        $this->datefinTache = $datefinTache;
    }

    /**
     * @return mixed
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * @param mixed $priorite
     */
    public function setPriorite($priorite): void
    {
        $this->priorite = $priorite;
    }

    /**
     * @return mixed
     */
    public function getEtatTache()
    {
        return $this->etatTache;
    }

    /**
     * @param mixed $etatTache
     */
    public function setEtatTache($etatTache): void
    {
        $this->etatTache = $etatTache;
    }

    /**
     * @return mixed
     */
    public function getTauxAvancement()
    {
        return $this->tauxAvancement;
    }

    /**
     * @param mixed $tauxAvancement
     */
    public function setTauxAvancement($tauxAvancement): void
    {
        $this->tauxAvancement = $tauxAvancement;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreTache(): ?string
    {
        return $this->titreTache;
    }

    public function setTitreTache(string $titreTache): self
    {
        $this->titreTache = $titreTache;

        return $this;
    }

    public function getMembreEquipe(): ?Utilisateur
    {
        return $this->membre_equipe;
    }

    public function setMembreEquipe(?Utilisateur $membre_equipe): self
    {
        $this->membre_equipe = $membre_equipe;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): self
    {
        $this->module = $module;

        return $this;
    }
}
