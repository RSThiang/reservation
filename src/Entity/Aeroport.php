<?php

namespace App\Entity;

use App\Repository\AeroportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AeroportRepository::class)
 */
class Aeroport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_ae;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays;

    /**
     * @ORM\ManyToOne(targetEntity=Vol::class, inversedBy="aeroports")
     */
    private $Vol;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAe(): ?string
    {
        return $this->nom_ae;
    }

    public function setNomAe(string $nom_ae): self
    {
        $this->nom_ae = $nom_ae;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVol(): ?Vol
    {
        return $this->Vol;
    }

    public function setVol(?Vol $Vol): self
    {
        $this->Vol = $Vol;

        return $this;
    }
}
