<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
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
    private $name;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $logo;

//    /**
//     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="team")
//     */
//    private $members;

//    /**
//     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="team1")
//     */
//    private $events;

    public function __construct()
    {
//        $this->members = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo): self
    {
        $this->logo = $logo;

        return $this;
    }

//    /**
//     * @return Collection|Member[]
//     */
//    public function getMembers(): Collection
//    {
//        return $this->members;
//    }

//    public function addMember(Member $member): self
//    {
//        if (!$this->members->contains($member)) {
//            $this->members[] = $member;
//            $member->setTeam($this);
//        }
//
//        return $this;
//    }

//    public function removeMember(Member $member): self
//    {
//        if ($this->members->removeElement($member)) {
//            // set the owning side to null (unless already changed)
//            if ($member->getTeam() === $this) {
//                $member->setTeam(null);
//            }
//        }
//
//        return $this;
//    }

//    /**
//     * @return Collection|Event[]
//     */
//    public function getEvents(): Collection
//    {
//        return $this->events;
//    }

//    public function addEvent(Event $event): self
//    {
//        if (!$this->events->contains($event)) {
//            $this->events[] = $event;
//            $event->addTeam1($this);
//        }
//
//        return $this;
//    }

//    public function removeEvent(Event $event): self
//    {
//        if ($this->events->removeElement($event)) {
//            $event->removeTeam1($this);
//        }
//
//        return $this;
//    }
}
