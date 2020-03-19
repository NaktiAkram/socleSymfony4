<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PVRepository")
 */
class PV extends Kubernetes
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
    private $storageClassName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $storageCapacity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $accessMode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GlusterFS", mappedBy="pv")
     */
    private $glusterFS;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HostPath", mappedBy="pv")
     */
    private $hostPath;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NFS", mappedBy="pv")
     */
    private $nfs;

    public function __construct()
    {
        parent::__construct();
        $this->glusterFS = new ArrayCollection();
        $this->hostPath = new ArrayCollection();
        $this->nfs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStorageClassName(): ?string
    {
        return $this->storageClassName;
    }

    public function setStorageClassName(string $storageClassName): self
    {
        $this->storageClassName = $storageClassName;

        return $this;
    }

    public function getStorageCapacity(): ?string
    {
        return $this->storageCapacity;
    }

    public function setStorageCapacity(string $storageCapacity): self
    {
        $this->storageCapacity = $storageCapacity;

        return $this;
    }

    public function getAccessMode(): ?string
    {
        return $this->accessMode;
    }

    public function setAccessMode(string $accessMode): self
    {
        $this->accessMode = $accessMode;

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

    /**
     * @return Collection|GlusterFS[]
     */
    public function getGlusterFS(): Collection
    {
        return $this->glusterFS;
    }

    public function addGlusterF(GlusterFS $glusterF): self
    {
        if (!$this->glusterFS->contains($glusterF)) {
            $this->glusterFS[] = $glusterF;
            $glusterF->setPv($this);
        }

        return $this;
    }

    public function removeGlusterF(GlusterFS $glusterF): self
    {
        if ($this->glusterFS->contains($glusterF)) {
            $this->glusterFS->removeElement($glusterF);
            // set the owning side to null (unless already changed)
            if ($glusterF->getPv() === $this) {
                $glusterF->setPv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HostPath[]
     */
    public function getHostPath(): Collection
    {
        return $this->hostPath;
    }

    public function addHostPath(HostPath $hostPath): self
    {
        if (!$this->hostPath->contains($hostPath)) {
            $this->hostPath[] = $hostPath;
            $hostPath->setPv($this);
        }

        return $this;
    }

    public function removeHostPath(HostPath $hostPath): self
    {
        if ($this->hostPath->contains($hostPath)) {
            $this->hostPath->removeElement($hostPath);
            // set the owning side to null (unless already changed)
            if ($hostPath->getPv() === $this) {
                $hostPath->setPv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NFS[]
     */
    public function getNfs(): Collection
    {
        return $this->nfs;
    }

    public function addNf(NFS $nf): self
    {
        if (!$this->nfs->contains($nf)) {
            $this->nfs[] = $nf;
            $nf->setPv($this);
        }

        return $this;
    }

    public function removeNf(NFS $nf): self
    {
        if ($this->nfs->contains($nf)) {
            $this->nfs->removeElement($nf);
            // set the owning side to null (unless already changed)
            if ($nf->getPv() === $this) {
                $nf->setPv(null);
            }
        }

        return $this;
    }
}
