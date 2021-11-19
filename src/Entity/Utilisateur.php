<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $telephone;

    /**
     * @ORM\Column(name="adresse", type="string", length=200, nullable=false)
     */
    private $adresse;

    /**
     * @ORM\Column(name="login", type="string", length=200, nullable=false)
     */
    private $login;

    /**
     * @ORM\OneToOne(targetEntity=Role::class, cascade={"persist", "remove"})
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=Projet::class, mappedBy="admin")
     */
    private $admin_projets;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="membre_equipe")
     */
    private $taches;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="emetteur")
     */
    private $msg_em;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="recepteur")
     */
    private $msg_recep;

    public function __construct()
    {
        $this->$admin_projets = new ArrayCollection();
        $this->taches = new ArrayCollection();
        $this->msg_em = new ArrayCollection();
        $this->msg_recep = new ArrayCollection();
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @ORM\Column(name="mot_de_passe", type="string", length=200, nullable=false)
     */

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $admin_projets): self
    {
        if (!$this->admin_projets->contains($admin_projets)) {
            $this->admin_projets[] = $admin_projets;
            $admin_projets->setAdmin($this);
        }

        return $this;
    }

    public function removeProjet(Projet $admin_projets): self
    {
        if ($this->admin_projets->removeElement($admin_projets)) {
            // set the owning side to null (unless already changed)
            if ($admin_projets->getAdmin() === $this) {
                $admin_projets->setAdmin(null);
            }
        }

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
            $tach->setMembreEquipe($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getMembreEquipe() === $this) {
                $tach->setMembreEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMsgEm(): Collection
    {
        return $this->msg_em;
    }

    public function addMsgEm(Message $msgEm): self
    {
        if (!$this->msg_em->contains($msgEm)) {
            $this->msg_em[] = $msgEm;
            $msgEm->setEmetteur($this);
        }

        return $this;
    }

    public function removeMsgEm(Message $msgEm): self
    {
        if ($this->msg_em->removeElement($msgEm)) {
            // set the owning side to null (unless already changed)
            if ($msgEm->getEmetteur() === $this) {
                $msgEm->setEmetteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMsgRecep(): Collection
    {
        return $this->msg_recep;
    }

    public function addMsgRecep(Message $msgRecep): self
    {
        if (!$this->msg_recep->contains($msgRecep)) {
            $this->msg_recep[] = $msgRecep;
            $msgRecep->setRecepteur($this);
        }

        return $this;
    }

    public function removeMsgRecep(Message $msgRecep): self
    {
        if ($this->msg_recep->removeElement($msgRecep)) {
            // set the owning side to null (unless already changed)
            if ($msgRecep->getRecepteur() === $this) {
                $msgRecep->setRecepteur(null);
            }
        }

        return $this;
    }

}
