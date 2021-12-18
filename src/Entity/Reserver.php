<?php

namespace App\Entity;

use App\Repository\ReserverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserverRepository::class)
 */
class Reserver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="reservers")
     */
    private $Vol;

    public function __construct()
    {
        $this->Vol = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getVol(): Collection
    {
        return $this->Vol;
    }

    public function addVol(User $vol): self
    {
        if (!$this->Vol->contains($vol)) {
            $this->Vol[] = $vol;
        }

        return $this;
    }

    public function removeVol(User $vol): self
    {
        $this->Vol->removeElement($vol);

        return $this;
    }
}
