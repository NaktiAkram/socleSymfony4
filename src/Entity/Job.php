<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job extends Kubernetes
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
    private $restartPolicy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $backoffLimit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Containers", mappedBy="job")
     */
    private $containers;

    public function __construct()
    {
        parent::__construct();
        $this->containers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestartPolicy(): ?string
    {
        return $this->restartPolicy;
    }

    public function setRestartPolicy(string $restartPolicy): self
    {
        $this->restartPolicy = $restartPolicy;

        return $this;
    }

    public function getBackoffLimit(): ?string
    {
        return $this->backoffLimit;
    }

    public function setBackoffLimit(string $backoffLimit): self
    {
        $this->backoffLimit = $backoffLimit;

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
            $container->setJob($this);
        }

        return $this;
    }

    public function removeContainer(Containers $container): self
    {
        if ($this->containers->contains($container)) {
            $this->containers->removeElement($container);
            // set the owning side to null (unless already changed)
            if ($container->getJob() === $this) {
                $container->setJob(null);
            }
        }

        return $this;
    }
}
