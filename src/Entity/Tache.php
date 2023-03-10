<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 */
class Tache
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $echeance1;

    /**
     * @ORM\Column(type="date")
     */
    private $echeance2;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRealisation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $solde;

    /**
     * @ORM\Column(type="boolean")
     */
    private $efficace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Incident::class, inversedBy="tache")
     */
    private $incident;

    /**
     * @ORM\OneToMany(targetEntity=Affectation::class, mappedBy="tache")
     */
    private $affectations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $source;

    public function __construct()
    {
        $this->affectations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getEcheance1(): ?\DateTimeInterface
    {
        return $this->echeance1;
    }

    public function setEcheance1(\DateTimeInterface $echeance1): self
    {
        $this->echeance1 = $echeance1;

        return $this;
    }

    public function getEcheance2(): ?\DateTimeInterface
    {
        return $this->echeance2;
    }

    public function setEcheance2(\DateTimeInterface $echeance2): self
    {
        $this->echeance2 = $echeance2;

        return $this;
    }

    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->dateRealisation;
    }

    public function setDateRealisation(\DateTimeInterface $dateRealisation): self
    {
        $this->dateRealisation = $dateRealisation;

        return $this;
    }

    public function isSolde(): ?bool
    {
        return $this->solde;
    }

    public function setSolde(bool $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function isEfficace(): ?bool
    {
        return $this->efficace;
    }

    public function setEfficace(bool $efficace): self
    {
        $this->efficace = $efficace;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getIncident(): ?Incident
    {
        return $this->incident;
    }

    public function setIncident(?Incident $incident): self
    {
        $this->incident = $incident;

        return $this;
    }

    /**
     * @return Collection<int, Affectation>
     */
    public function getAffectations(): Collection
    {
        return $this->affectations;
    }

    public function addAffectation(Affectation $affectation): self
    {
        if (!$this->affectations->contains($affectation)) {
            $this->affectations[] = $affectation;
            $affectation->setTache($this);
        }

        return $this;
    }

    public function removeAffectation(Affectation $affectation): self
    {
        if ($this->affectations->removeElement($affectation)) {
            // set the owning side to null (unless already changed)
            if ($affectation->getTache() === $this) {
                $affectation->setTache(null);
            }
        }

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

}
