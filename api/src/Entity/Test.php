<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(mercure: true)]
#[ORM\Entity]
class Test
{
    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    #[ORM\OneToMany(mappedBy: 'test', targetEntity: Greeting::class)]
    private Collection $greetings;

    public function __construct()
    {
        $this->greetings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Greeting>
     */
    public function getGreetings(): Collection
    {
        return $this->greetings;
    }

    public function addGreeting(Greeting $greeting): self
    {
        if (!$this->greetings->contains($greeting)) {
            $this->greetings->add($greeting);
            $greeting->setTest($this);
        }

        return $this;
    }

    public function removeGreeting(Greeting $greeting): self
    {
        if ($this->greetings->removeElement($greeting)) {
            // set the owning side to null (unless already changed)
            if ($greeting->getTest() === $this) {
                $greeting->setTest(null);
            }
        }

        return $this;
    }
}
