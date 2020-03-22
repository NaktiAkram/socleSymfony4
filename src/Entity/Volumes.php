<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolumesRepository")
 */
class Volumes
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Deployments", inversedBy="volumes")
     */
    private $deployment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ConfigMapVolumes", mappedBy="volume")
     */
    private $configMapVolumes;

    public function __construct()
    {
        $this->configMapVolumes = new ArrayCollection();
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

    public function getDeployment(): ?Deployments
    {
        return $this->deployment;
    }

    public function setDeployment(?Deployments $deployment): self
    {
        $this->deployment = $deployment;

        return $this;
    }

    /**
     * @return Collection|ConfigMapVolumes[]
     */
    public function getConfigMapVolumes(): Collection
    {
        return $this->configMapVolumes;
    }

    public function addConfigMapVolume(ConfigMapVolumes $configMapVolume): self
    {
        if (!$this->configMapVolumes->contains($configMapVolume)) {
            $this->configMapVolumes[] = $configMapVolume;
            $configMapVolume->setVolume($this);
        }

        return $this;
    }

    public function removeConfigMapVolume(ConfigMapVolumes $configMapVolume): self
    {
        if ($this->configMapVolumes->contains($configMapVolume)) {
            $this->configMapVolumes->removeElement($configMapVolume);
            // set the owning side to null (unless already changed)
            if ($configMapVolume->getVolume() === $this) {
                $configMapVolume->setVolume(null);
            }
        }

        return $this;
    }
}
