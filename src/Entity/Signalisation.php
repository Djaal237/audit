<?php

namespace App\Entity;

use App\Repository\SignalisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SignalisationRepository::class)
 */
class Signalisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="signalisations")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Incident::class, inversedBy="signalisations")
     */
    private $incident;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Users
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Users $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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
}
