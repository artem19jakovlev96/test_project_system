<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $Name;

    #[ORM\Column(type: 'string', length: 10)]
    private $Abbr;

    #[ORM\Column(type: 'smallint')]
    private $Tax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getAbbr(): ?string
    {
        return $this->Abbr;
    }

    public function setAbbr(string $Abbr): self
    {
        $this->Abbr = $Abbr;

        return $this;
    }

    public function getTax(): ?int
    {
        return $this->Tax;
    }

    public function setTax(int $Tax): self
    {
        $this->Tax = $Tax;

        return $this;
    }
}
