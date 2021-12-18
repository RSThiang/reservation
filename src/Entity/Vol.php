<?php

namespace App\Entity;

use App\Repository\VolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VolRepository::class)
 */
class Vol
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_depart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_arrivee;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_classe_A;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_classe_B;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_class_A;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_class_B;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $v_depart;

    /**
     * @ORM\OneToMany(targetEntity=Aeroport::class, mappedBy="Vol")
     */
    private $aeroports;

    public function __construct()
    {
        $this->aeroports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTimeInterface $date_arrivee): self
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getNbClasseA(): ?int
    {
        return $this->nb_classe_A;
    }

    public function setNbClasseA(int $nb_classe_A): self
    {
        $this->nb_classe_A = $nb_classe_A;

        return $this;
    }

    public function getNbClasseB(): ?int
    {
        return $this->nb_classe_B;
    }

    public function setNbClasseB(int $nb_classe_B): self
    {
        $this->nb_classe_B = $nb_classe_B;

        return $this;
    }

    public function getPrixClassA(): ?float
    {
        return $this->prix_class_A;
    }

    public function setPrixClassA(float $prix_class_A): self
    {
        $this->prix_class_A = $prix_class_A;

        return $this;
    }

    public function getPrixClassB(): ?float
    {
        return $this->prix_class_B;
    }

    public function setPrixClassB(float $prix_class_B): self
    {
        $this->prix_class_B = $prix_class_B;

        return $this;
    }

    public function getVDepart(): ?string
    {
        return $this->v_depart;
    }

    public function setVDepart(string $v_depart): self
    {
        $this->v_depart = $v_depart;

        return $this;
    }

    /**
     * @return Collection|Aeroport[]
     */
    public function getAeroports(): Collection
    {
        return $this->aeroports;
    }

    public function addAeroport(Aeroport $aeroport): self
    {
        if (!$this->aeroports->contains($aeroport)) {
            $this->aeroports[] = $aeroport;
            $aeroport->setVol($this);
        }

        return $this;
    }

    public function removeAeroport(Aeroport $aeroport): self
    {
        if ($this->aeroports->removeElement($aeroport)) {
            // set the owning side to null (unless already changed)
            if ($aeroport->getVol() === $this) {
                $aeroport->setVol(null);
            }
        }

        return $this;
    }
}
