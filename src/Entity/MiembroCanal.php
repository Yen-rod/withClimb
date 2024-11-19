<?php

namespace App\Entity;

use App\Repository\MiembroCanalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MiembroCanalRepository::class)]
class MiembroCanal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUsuario = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaUnion = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $rol = null;

    #[ORM\ManyToOne(inversedBy: 'miembrosCanal')]
    private ?Usuarios $usuarios = null;

    #[ORM\ManyToOne(inversedBy: 'miembros')]
    private ?CanalComunicacion $canalComunicacion = null;

    #[ORM\ManyToOne(inversedBy: 'miembroCanals')]
    private ?Usuarios $usuario = null;

    #[ORM\ManyToOne(inversedBy: 'miembroCanals')]
    private ?CanalComunicacion $canal = null;

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

    public function getFechaUnion(): ?\DateTimeInterface
    {
        return $this->fechaUnion;
    }

    public function setFechaUnion(?\DateTimeInterface $fechaUnion): static
    {
        $this->fechaUnion = $fechaUnion;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(?string $rol): static
    {
        $this->rol = $rol;

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

    public function getCanalComunicacion(): ?CanalComunicacion
    {
        return $this->canalComunicacion;
    }

    public function setCanalComunicacion(?CanalComunicacion $canalComunicacion): static
    {
        $this->canalComunicacion = $canalComunicacion;

        return $this;
    }

    public function getUsuario(): ?Usuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuarios $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getCanal(): ?CanalComunicacion
    {
        return $this->canal;
    }

    public function setCanal(?CanalComunicacion $canal): static
    {
        $this->canal = $canal;

        return $this;
    }
}
