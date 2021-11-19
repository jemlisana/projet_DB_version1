<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4000)
     */
    private $message_text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="msg_em")
     */
    private $emetteur;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="msg_recep")
     */
    private $recepteur;

    /**
     * @ORM\Column(type="date")
     */
    private $date_envoi;

    /**
     * @ORM\Column(type="date")
     */
    private $date_lecture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageText(): ?string
    {
        return $this->message_text;
    }

    public function setMessageText(string $message_text): self
    {
        $this->message_text = $message_text;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getEmetteur(): ?Utilisateur
    {
        return $this->emetteur;
    }

    public function setEmetteur(?Utilisateur $emetteur): self
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    public function getRecepteur(): ?Utilisateur
    {
        return $this->recepteur;
    }

    public function setRecepteur(?Utilisateur $recepteur): self
    {
        $this->recepteur = $recepteur;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDateEnvoi(\DateTimeInterface $date_envoi): self
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }

    public function getDateLecture(): ?\DateTimeInterface
    {
        return $this->date_lecture;
    }

    public function setDateLecture(\DateTimeInterface $date_lecture): self
    {
        $this->date_lecture = $date_lecture;

        return $this;
    }
}
