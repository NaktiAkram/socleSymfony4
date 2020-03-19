<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolumeMountsRepository")
 */
class VolumeMounts
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
    private $mountPath;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subPath;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Containers", inversedBy="volumeMounts")
     */
    private $containers;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSubPath(): ?string
    {
        return $this->subPath;
    }

    public function setSubPath(string $subPath): self
    {
        $this->subPath = $subPath;

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
