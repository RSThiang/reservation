<?php

namespace App\Entity;

use App\Repository\PiloteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PiloteRepository::class)
 */
class Pilote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_pilote;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom_pilote;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPilote(): ?string
    {
        return $this->nom_pilote;
    }

    public function setNomPilote(string $nom_pilote): self
    {
        $this->nom_pilote = $nom_pilote;

        return $this;
    }

    public function getPrenomPilote(): ?string
    {
        return $this->prenom_pilote;
    }

    public function setPrenomPilote(string $prenom_pilote): self
    {
        $this->prenom_pilote = $prenom_pilote;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }
}
