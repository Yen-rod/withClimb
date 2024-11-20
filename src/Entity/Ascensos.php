<?php

namespace App\Entity;

use App\Repository\AscensosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AscensosRepository::class)]
class Ascensos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUsuario = null;

    #[ORM\Column]
    private ?int $idVia = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'ascensos')]
    private ?Usuarios $ascensoUsuario = null;


    #[ORM\ManyToOne(inversedBy: 'ascensos')]
    private ?Vias $via = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): static
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdVia(): ?int
    {
        return $this->idVia;
    }

    public function setIdVia(int $idVia): static
    {
        $this->idVia = $idVia;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getAscensoUsuario(): ?Usuarios
    {
        return $this->ascensoUsuario;
    }

    public function setAscensoUsuario(?Usuarios $ascensoUsuario): static
    {
        $this->ascensoUsuario = $ascensoUsuario;

        return $this;
    }



    public function getVia(): ?Vias
    {
        return $this->via;
    }

    public function setVia(?Vias $via): static
    {
        $this->via = $via;

        return $this;
    }
}
