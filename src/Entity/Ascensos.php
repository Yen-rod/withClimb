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
    private ?Usuarios $usuarios = null;

    #[ORM\ManyToOne(inversedBy: 'viaAscensos')]
    private ?Vias $vias = null;

    #[ORM\ManyToOne(inversedBy: 'ascensosUsuario')]
    private ?Usuarios $ascensosUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'ascensos')]
    private ?Vias $ascensosVia = null;

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

    public function getUsuarios(): ?Usuarios
    {
        return $this->usuarios;
    }

    public function setUsuarios(?Usuarios $usuarios): static
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    public function getVias(): ?Vias
    {
        return $this->vias;
    }

    public function setVias(?Vias $vias): static
    {
        $this->vias = $vias;

        return $this;
    }

    public function getAscensosUsuario(): ?Usuarios
    {
        return $this->ascensosUsuario;
    }

    public function setAscensosUsuario(?Usuarios $ascensosUsuario): static
    {
        $this->ascensosUsuario = $ascensosUsuario;

        return $this;
    }

    public function getAscensosVia(): ?Vias
    {
        return $this->ascensosVia;
    }

    public function setAscensosVia(?Vias $ascensosVia): static
    {
        $this->ascensosVia = $ascensosVia;

        return $this;
    }
}
