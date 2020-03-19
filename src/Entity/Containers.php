<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContainersRepository")
 */
class Containers
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
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tag;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $repository;

    /**
     * @ORM\Column(type="integer")
     */
    private $port;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mountPath;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Deployments", inversedBy="containers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $deployment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job", inversedBy="containers")
     */
    private $job;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatefulSet", inversedBy="containers")
     */
    private $statefulSet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VolumeMounts", mappedBy="containers")
     */
    private $volumeMounts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Execute", mappedBy="containers")
     */
    private $execute;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Variables", mappedBy="containers")
     */
    private $variables;

    public function __construct()
    {
        $this->volumeMounts = new ArrayCollection();
        $this->execute = new ArrayCollection();
        $this->variables = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getRepository(): ?string
    {
        return $this->repository;
    }

    public function setRepository(string $repository): self
    {
        $this->repository = $repository;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getMountPath(): ?string
    {
        return $this->mountPath;
    }

    public function setMountPath(string $mountPath): self
    {
        $this->mountPath = $mountPath;

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

    public function getJob(): ?Job
    {
        return $this->job;
    }

    public function setJob(?Job $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getStatefulSet(): ?StatefulSet
    {
        return $this->statefulSet;
    }

    public function setStatefulSet(?StatefulSet $statefulSet): self
    {
        $this->statefulSet = $statefulSet;

        return $this;
    }

    /**
     * @return Collection|VolumeMounts[]
     */
    public function getVolumeMounts(): Collection
    {
        return $this->volumeMounts;
    }

    public function addVolumeMount(VolumeMounts $volumeMount): self
    {
        if (!$this->volumeMounts->contains($volumeMount)) {
            $this->volumeMounts[] = $volumeMount;
            $volumeMount->setContainers($this);
        }

        return $this;
    }

    public function removeVolumeMount(VolumeMounts $volumeMount): self
    {
        if ($this->volumeMounts->contains($volumeMount)) {
            $this->volumeMounts->removeElement($volumeMount);
            // set the owning side to null (unless already changed)
            if ($volumeMount->getContainers() === $this) {
                $volumeMount->setContainers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Execute[]
     */
    public function getExecute(): Collection
    {
        return $this->execute;
    }

    public function addExecute(Execute $execute): self
    {
        if (!$this->execute->contains($execute)) {
            $this->execute[] = $execute;
            $execute->setContainers($this);
        }

        return $this;
    }

    public function removeExecute(Execute $execute): self
    {
        if ($this->execute->contains($execute)) {
            $this->execute->removeElement($execute);
            // set the owning side to null (unless already changed)
            if ($execute->getContainers() === $this) {
                $execute->setContainers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Variables[]
     */
    public function getVariables(): Collection
    {
        return $this->variables;
    }

    public function addVariable(Variables $variable): self
    {
        if (!$this->variables->contains($variable)) {
            $this->variables[] = $variable;
            $variable->setContainers($this);
        }

        return $this;
    }

    public function removeVariable(Variables $variable): self
    {
        if ($this->variables->contains($variable)) {
            $this->variables->removeElement($variable);
            // set the owning side to null (unless already changed)
            if ($variable->getContainers() === $this) {
                $variable->setContainers(null);
            }
        }

        return $this;
    }
}
