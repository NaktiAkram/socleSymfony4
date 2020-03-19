<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConfigMapVolumesRepository")
 */
class ConfigMapVolumes
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
    private $configNameName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Volumes", inversedBy="configMapVolumes")
     */
    private $volume;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Items", mappedBy="configMapVolumes")
     */
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfigNameName(): ?string
    {
        return $this->configNameName;
    }

    public function setConfigNameName(string $configNameName): self
    {
        $this->configNameName = $configNameName;

        return $this;
    }

    public function getVolume(): ?Volumes
    {
        return $this->volume;
    }

    public function setVolume(?Volumes $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @return Collection|Items[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Items $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setConfigMapVolumes($this);
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            // set the owning side to null (unless already changed)
            if ($item->getConfigMapVolumes() === $this) {
                $item->setConfigMapVolumes(null);
            }
        }

        return $this;
    }
}
