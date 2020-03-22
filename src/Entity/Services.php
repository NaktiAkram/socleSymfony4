<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicesRepository")
 */
class Services extends Kubernetes
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $sessionAffinity = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ports", mappedBy="services")
     */
    private $ports;

    public function __construct()
    {
        parent::__construct();
        $this->ports = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSessionAffinity(): ?array
    {
        return $this->sessionAffinity;
    }

    public function setSessionAffinity(?array $sessionAffinity): self
    {
        $this->sessionAffinity = $sessionAffinity;

        return $this;
    }

    /**
     * @return Collection|Ports[]
     */
    public function getPorts(): Collection
    {
        return $this->ports;
    }

    public function addPort(Ports $port): self
    {
        if (!$this->ports->contains($port)) {
            $this->ports[] = $port;
            $port->setServices($this);
        }

        return $this;
    }

    public function removePort(Ports $port): self
    {
        if ($this->ports->contains($port)) {
            $this->ports->removeElement($port);
            // set the owning side to null (unless already changed)
            if ($port->getServices() === $this) {
                $port->setServices(null);
            }
        }

        return $this;
    }
}
