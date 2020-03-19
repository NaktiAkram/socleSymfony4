<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeploymentsRepository")
 */
class Deployments extends Kubernetes
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
    private $selector;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $replicas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Containers", mappedBy="deployment")
     */
    private $containers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Volumes", mappedBy="deployment")
     */
    private $volumes;

    public function __construct()
    {
        parent::__construct();
        $this->containers = new ArrayCollection();
        $this->volumes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSelector(): ?string
    {
        return $this->selector;
    }

    public function setSelector(string $selector): self
    {
        $this->selector = $selector;

        return $this;
    }

    public function getReplicas(): ?int
    {
        return $this->replicas;
    }

    public function setReplicas(?int $replicas): self
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * @return Collection|Containers[]
     */
    public function getContainers(): Collection
    {
        return $this->containers;
    }

    public function addContainer(Containers $container): self
    {
        if (!$this->containers->contains($container)) {
            $this->containers[] = $container;
            $container->setDeployment($this);
        }

        return $this;
    }

    public function removeContainer(Containers $container): self
    {
        if ($this->containers->contains($container)) {
            $this->containers->removeElement($container);
            // set the owning side to null (unless already changed)
            if ($container->getDeployment() === $this) {
                $container->setDeployment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Volumes[]
     */
    public function getVolumes(): Collection
    {
        return $this->volumes;
    }

    public function addVolume(Volumes $volume): self
    {
        if (!$this->volumes->contains($volume)) {
            $this->volumes[] = $volume;
            $volume->setDeployment($this);
        }

        return $this;
    }

    public function removeVolume(Volumes $volume): self
    {
        if ($this->volumes->contains($volume)) {
            $this->volumes->removeElement($volume);
            // set the owning side to null (unless already changed)
            if ($volume->getDeployment() === $this) {
                $volume->setDeployment(null);
            }
        }

        return $this;
    }
}
