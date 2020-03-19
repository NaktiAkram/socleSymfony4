<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemsRepository")
 */
class Items
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
    private $itemKey;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $itemValue;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ConfigMapVolumes", inversedBy="items")
     */
    private $configMapVolumes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemKey(): ?string
    {
        return $this->itemKey;
    }

    public function setItemKey(string $itemKey): self
    {
        $this->itemKey = $itemKey;

        return $this;
    }

    public function getItemValue(): ?string
    {
        return $this->itemValue;
    }

    public function setItemValue(string $itemValue): self
    {
        $this->itemValue = $itemValue;

        return $this;
    }

    public function getConfigMapVolumes(): ?ConfigMapVolumes
    {
        return $this->configMapVolumes;
    }

    public function setConfigMapVolumes(?ConfigMapVolumes $configMapVolumes): self
    {
        $this->configMapVolumes = $configMapVolumes;

        return $this;
    }
}
