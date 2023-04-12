<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_u", type="string", length=255, nullable=false)
     */
    private $nomU;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_u", type="string", length=255, nullable=false)
     */
    private $prenomU;

    /**
     * @var string
     *
     * @ORM\Column(name="email_u", type="string", length=255, nullable=false)
     */
    private $emailU;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_u", type="string", length=15, nullable=false)
     */
    private $telU;

    /**
     * @var string
     *
     * @ORM\Column(name="role_u", type="string", length=10, nullable=false)
     */
    private $roleU;

    /**
     * @var string
     *
     * @ORM\Column(name="password_u", type="string", length=255, nullable=false)
     */
    private $passwordU;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255, nullable=false)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule_u", type="string", length=255, nullable=false)
     */
    private $matriculeU;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pfp_u", type="blob", length=0, nullable=true, options={"default"="NULL"})
     */
    private $pfpU = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiant", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $identifiant = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="active", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $active = NULL;

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getNomU(): ?string
    {
        return $this->nomU;
    }

    public function setNomU(string $nomU): self
    {
        $this->nomU = $nomU;

        return $this;
    }

    public function getPrenomU(): ?string
    {
        return $this->prenomU;
    }

    public function setPrenomU(string $prenomU): self
    {
        $this->prenomU = $prenomU;

        return $this;
    }

    public function getEmailU(): ?string
    {
        return $this->emailU;
    }

    public function setEmailU(string $emailU): self
    {
        $this->emailU = $emailU;

        return $this;
    }

    public function getTelU(): ?string
    {
        return $this->telU;
    }

    public function setTelU(string $telU): self
    {
        $this->telU = $telU;

        return $this;
    }

    public function getRoleU(): ?string
    {
        return $this->roleU;
    }

    public function setRoleU(string $roleU): self
    {
        $this->roleU = $roleU;

        return $this;
    }

    public function getPasswordU(): ?string
    {
        return $this->passwordU;
    }

    public function setPasswordU(string $passwordU): self
    {
        $this->passwordU = $passwordU;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getMatriculeU(): ?string
    {
        return $this->matriculeU;
    }

    public function setMatriculeU(string $matriculeU): self
    {
        $this->matriculeU = $matriculeU;

        return $this;
    }

    public function getPfpU()
    {
        return $this->pfpU;
    }

    public function setPfpU($pfpU): self
    {
        $this->pfpU = $pfpU;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(?string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->nomU . ' ' . $this->prenomU;
    }


}
