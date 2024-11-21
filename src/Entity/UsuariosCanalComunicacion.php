<?php

namespace App\Entity;

use App\Repository\UsuariosCanalComunicacionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosCanalComunicacionRepository::class)]
#[ORM\Table(name: 'usuarios_canal_comunicacion')]
class UsuariosCanalComunicacion
{

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaUnion = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $rol = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Usuarios::class, inversedBy: 'usuariosCanalComunicacion')]
    #[ORM\JoinColumn(nullable: false)]
    private $idUsuarios;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CanalComunicacion::class, inversedBy: 'usuariosCanalComunicacion')]
    #[ORM\JoinColumn(nullable: false)]
    private $idCanalComunicacion;


    /*
    #[ORM\ManyToOne(inversedBy: 'miembrosCanal')]
    private ?Usuarios $miembroUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'miembros')]
    private ?CanalComunicacion $canalComunicacion = null;

    #[ORM\ManyToOne(inversedBy: 'miembroCanals')]
    private ?CanalComunicacion $canal = null;
    */

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

    public function getIdUsuarios(): ?Usuarios
    {
        return $this->idUsuarios;
    }

    public function setIdUsuarios(?Usuarios $idUsuarios): static
    {
        $this->idUsuarios = $idUsuarios;

        return $this;
    }

    public function getIdCanalComunicacion(): ?CanalComunicacion
    {
        return $this->idCanalComunicacion;
    }

    public function setIdCanalComunicacion(?CanalComunicacion $idCanalComunicacion): static
    {
        $this->idCanalComunicacion = $idCanalComunicacion;

        return $this;
    }


}
