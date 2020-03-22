<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnvironmentsRepository")
 */
class Environments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $env;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Kubernetes", inversedBy="environments")
     */
    private $kubernetes;

    public function __construct()
    {
        $this->kubernetes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnv(): ?string
    {
        return $this->env;
    }

    public function setEnv(string $env): self
    {
        $this->env = $env;

        return $this;
    }

    /**
     * @return Collection|Kubernetes[]
     */
    public function getKubernetes(): Collection
    {
        return $this->kubernetes;
    }

    public function addKubernete(Kubernetes $kubernete): self
    {
        if (!$this->kubernetes->contains($kubernete)) {
            $this->kubernetes[] = $kubernete;
        }

        return $this;
    }

    public function removeKubernete(Kubernetes $kubernete): self
    {
        if ($this->kubernetes->contains($kubernete)) {
            $this->kubernetes->removeElement($kubernete);
        }

        return $this;
    }
}
