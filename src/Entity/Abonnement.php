<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity
 * @UniqueEntity(fields={"identifiant"}, message="This identifiant is already taken.")
 */
class Abonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true, options={"default"="NULL"})
     * @Assert\NotBlank()
     */
    private $image = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiant", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=50, nullable=false)
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "The field must be exactly {{ limit }} digits long",
     *      maxMessage = "The field must be exactly {{ limit }} digits long"
     * )
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateD", type="date", nullable=false)
     */
    private $dated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateF", type="date", nullable=false)
     */
    private $datef;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     * @Assert\Range(min=50, max=150)
     */
    private $prix;

    /**
     * @var \Offre2
     *
     * @ORM\ManyToOne(targetEntity="Offre2")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOffre", referencedColumnName="id")
     * })
     */
    private $idOffre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

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

    public function getDated(): ?\DateTimeInterface
    {
        return $this->dated;
    }

    public function setDated(\DateTimeInterface $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getDatef(): ?\DateTimeInterface
    {
        return $this->datef;
    }

    public function setDatef(\DateTimeInterface $datef): self
    {
        $this->datef = $datef;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdOffre(): ?Offre2
    {
        return $this->idOffre;
    }

    public function setIdOffre(?Offre2 $idOffre): self
    {
        $this->idOffre = $idOffre;

        return $this;
    }


}
