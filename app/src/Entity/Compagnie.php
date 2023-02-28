<?php

namespace App\Entity;

use App\Repository\CompagnieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompagnieRepository::class)]
class Compagnie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $country_origin = null;

    #[ORM\Column(length: 255)]
    private ?string $name_short = null;

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

    public function getCountryOrigin(): ?string
    {
        return $this->country_origin;
    }

    public function setCountryOrigin(string $country_origin): self
    {
        $this->country_origin = $country_origin;

        return $this;
    }

    public function getNameShort(): ?string
    {
        return $this->name_short;
    }

    public function setNameShort(string $name_short): self
    {
        $this->name_short = $name_short;

        return $this;
    }
}
