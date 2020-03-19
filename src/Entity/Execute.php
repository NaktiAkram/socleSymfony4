<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExecuteRepository")
 */
class Execute
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
    private $command;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $args;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Containers", inversedBy="execute")
     */
    private $containers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommand(): ?string
    {
        return $this->command;
    }

    public function setCommand(string $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function getArgs(): ?string
    {
        return $this->args;
    }

    public function setArgs(string $args): self
    {
        $this->args = $args;

        return $this;
    }

    public function getContainers(): ?Containers
    {
        return $this->containers;
    }

    public function setContainers(?Containers $containers): self
    {
        $this->containers = $containers;

        return $this;
    }
}
