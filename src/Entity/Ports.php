<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PortsRepository")
 */
class Ports
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
    private $protocol;

    /**
     * @ORM\Column(type="integer")
     */
    private $port;

    /**
     * @ORM\Column(type="integer")
     */
    private $targetPort;

    /**
     * @ORM\Column(type="integer")
     */
    private $nodePort;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Services", inversedBy="ports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $services;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(string $protocol): self
    {
        $this->protocol = $protocol;

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

    public function getTargetPort(): ?int
    {
        return $this->targetPort;
    }

    public function setTargetPort(int $targetPort): self
    {
        $this->targetPort = $targetPort;

        return $this;
    }

    public function getNodePort(): ?int
    {
        return $this->nodePort;
    }

    public function setNodePort(int $nodePort): self
    {
        $this->nodePort = $nodePort;

        return $this;
    }

    public function getServices(): ?Services
    {
        return $this->services;
    }

    public function setServices(?Services $services): self
    {
        $this->services = $services;

        return $this;
    }
}
