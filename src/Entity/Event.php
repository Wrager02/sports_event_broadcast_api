<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $time;

    /**
     * @ORM\ManyToMany(targetEntity=Team::class, inversedBy="events")
     * @ORM\JoinTable(name="event_team_1")
     */
    private $team1;

    /**
     * @ORM\ManyToMany(targetEntity=Team::class, inversedBy="events")
     * @ORM\JoinTable(name="event_team_2")
     */
    private $team2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $game;

    public function __construct()
    {
        $this->team1 = new ArrayCollection();
        $this->team2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(?string $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeam1(): Collection
    {
        return $this->team1;
    }

    public function addTeam1(Team $team1): self
    {
        if (!$this->team1->contains($team1)) {
            $this->team1[] = $team1;
        }

        return $this;
    }

    public function removeTeam1(Team $team1): self
    {
        $this->team1->removeElement($team1);

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeam2(): Collection
    {
        return $this->team2;
    }

    public function addTeam2(Team $team2): self
    {
        if (!$this->team2->contains($team2)) {
            $this->team2[] = $team2;
        }

        return $this;
    }

    public function removeTeam2(Team $team2): self
    {
        $this->team2->removeElement($team2);

        return $this;
    }

    public function getGame(): ?string
    {
        return $this->game;
    }

    public function setGame(string $game): self
    {
        $this->game = $game;

        return $this;
    }
}
