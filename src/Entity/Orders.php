<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $taxnumber;

    #[ORM\Column(type: 'smallint')]
    private $productid;

    #[ORM\Column(type: 'integer')]
    private $productprice;

    #[ORM\Column(type: 'float')]
    private $fullprice;
    private $productidstr;


    public function getProductidstr()
    {
        return $this->productidstr;
    }

    public function setProductidstr($productidstr): self
    {
        $this->productidstr = $productidstr;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaxnumber(): ?string
    {
        return $this->taxnumber;
    }

    public function setTaxnumber(string $taxnumber): self
    {
        $this->taxnumber = $taxnumber;

        return $this;
    }

    public function getProductid(): ?int
    {
        return $this->productid;
    }

    public function setProductid(int $productid): self
    {
        $this->productid = $productid;

        return $this;
    }

    public function getProductprice(): ?int
    {
        return $this->productprice;
    }

    public function setProductprice(int $productprice): self
    {
        $this->productprice = $productprice;

        return $this;
    }

    public function getFullprice(): ?float
    {
        return $this->fullprice;
    }

    public function setFullprice(float $fullprice): self
    {
        $this->fullprice = $fullprice;

        return $this;
    }
}
