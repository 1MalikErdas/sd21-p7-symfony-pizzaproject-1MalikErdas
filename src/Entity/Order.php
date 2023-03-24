<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pizza = null;

    #[ORM\Column(length: 255)]
    private ?string $size = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPizza(): ?string
    {
        return $this->pizza;
    }

    public function setPizza(string $pizza): self
    {
        $this->pizza = $pizza;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }
}
