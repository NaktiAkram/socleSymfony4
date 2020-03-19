<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValuesRepository")
 */
class Values
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kubernetes", mappedBy="value")
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
            $kubernete->setValue($this);
        }

        return $this;
    }

    public function removeKubernete(Kubernetes $kubernete): self
    {
        if ($this->kubernetes->contains($kubernete)) {
            $this->kubernetes->removeElement($kubernete);
            // set the owning side to null (unless already changed)
            if ($kubernete->getValue() === $this) {
                $kubernete->setValue(null);
            }
        }

        return $this;
    }
}
