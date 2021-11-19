<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
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
    private $rolelib;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRolelib(): ?string
    {
        return $this->rolelib;
    }

    public function setRolelib(string $rolelib): self
    {
        $this->rolelib = $rolelib;

        return $this;
    }
}
