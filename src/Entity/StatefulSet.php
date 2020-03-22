<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatefulSetRepository")
 */
class StatefulSet extends Kubernetes
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $terminationGracePeriodSeconds;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Containers", mappedBy="statefulSet")
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

    public function getTerminationGracePeriodSeconds(): ?int
    {
        return $this->terminationGracePeriodSeconds;
    }

    public function setTerminationGracePeriodSeconds(?int $terminationGracePeriodSeconds): self
    {
        $this->terminationGracePeriodSeconds = $terminationGracePeriodSeconds;

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
            $container->setStatefulSet($this);
        }

        return $this;
    }

    public function removeContainer(Containers $container): self
    {
        if ($this->containers->contains($container)) {
            $this->containers->removeElement($container);
            // set the owning side to null (unless already changed)
            if ($container->getStatefulSet() === $this) {
                $container->setStatefulSet(null);
            }
        }

        return $this;
    }
}
