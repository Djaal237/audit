<?php

namespace App\Entity;

use App\Repository\IncidentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IncidentRepository::class)
 */
class Incident
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
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateHeureConstat;

    /**
     * @ORM\Column(type="date")
     */
    private $dateHeureDocument;

    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="source")
     */
    private $tache;

    /**
     * @ORM\OneToMany(targetEntity=Signalisation::class, mappedBy="incident")
     */
    private $signalisations;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="incidents")
     */
    private $categorie;

    public function __construct()
    {
        $this->tache = new ArrayCollection();
        $this->signalisations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateHeureConstat(): ?\DateTimeInterface
    {
        return $this->dateHeureConstat;
    }

    public function setDateHeureConstat(\DateTimeInterface $dateHeureConstat): self
    {
        $this->dateHeureConstat = $dateHeureConstat;

        return $this;
    }

    public function getDateHeureDocument(): ?\DateTimeInterface
    {
        return $this->dateHeureDocument;
    }

    public function setDateHeureDocument(\DateTimeInterface $dateHeureDocument): self
    {
        $this->dateHeureDocument = $dateHeureDocument;

        return $this;
    }

    /**
     * @return Collection<int, Tache>
     */
    public function getTache(): Collection
    {
        return $this->tache;
    }

    public function addTache(Tache $tache): self
    {
        if (!$this->tache->contains($tache)) {
            $this->tache[] = $tache;
            $tache->setSource($this);
        }

        return $this;
    }

    public function removeTache(Tache $tache): self
    {
        if ($this->tache->removeElement($tache)) {
            // set the owning side to null (unless already changed)
            if ($tache->getSource() === $this) {
                $tache->setSource(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Signalisation>
     */
    public function getSignalisations(): Collection
    {
        return $this->signalisations;
    }

    public function addSignalisation(Signalisation $signalisation): self
    {
        if (!$this->signalisations->contains($signalisation)) {
            $this->signalisations[] = $signalisation;
            $signalisation->setIncident($this);
        }

        return $this;
    }

    public function removeSignalisation(Signalisation $signalisation): self
    {
        if ($this->signalisations->removeElement($signalisation)) {
            // set the owning side to null (unless already changed)
            if ($signalisation->getIncident() === $this) {
                $signalisation->setIncident(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
