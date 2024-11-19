<?php

namespace App\Entity;

use App\Repository\ComentariosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComentariosRepository::class)]
class Comentarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUsuario = null;

    #[ORM\Column]
    private ?int $idTipoComentario = null;

    #[ORM\Column]
    private ?int $idComentado = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comentario = null;

    #[ORM\Column(nullable: true)]
    private ?int $puntuacion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?Usuarios $comentarioUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'tipoComentarios')]
    private ?TipoComentario $tipoComentario = null;

    #[ORM\ManyToOne(inversedBy: 'comentariosUsuarios')]
    private ?Usuarios $comentarioUsuarios = null;

    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?TipoComentario $comentarioTipoComentario = null;

    #[ORM\ManyToOne(inversedBy: 'viaComentarios')]
    private ?Vias $vias = null;

    #[ORM\ManyToOne(inversedBy: 'restauranteComentarios')]
    private ?Restaurantes $restaurantes = null;

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

    public function getIdTipoComentario(): ?int
    {
        return $this->idTipoComentario;
    }

    public function setIdTipoComentario(int $idTipoComentario): static
    {
        $this->idTipoComentario = $idTipoComentario;

        return $this;
    }

    public function getIdComentado(): ?int
    {
        return $this->idComentado;
    }

    public function setIdComentado(int $idComentado): static
    {
        $this->idComentado = $idComentado;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): static
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getPuntuacion(): ?int
    {
        return $this->puntuacion;
    }

    public function setPuntuacion(?int $puntuacion): static
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getComentarioUsuario(): ?Usuarios
    {
        return $this->comentarioUsuario;
    }

    public function setComentarioUsuario(?Usuarios $comentarioUsuario): static
    {
        $this->comentarioUsuario = $comentarioUsuario;

        return $this;
    }

    public function getTipoComentario(): ?TipoComentario
    {
        return $this->tipoComentario;
    }

    public function setTipoComentario(?TipoComentario $tipoComentario): static
    {
        $this->tipoComentario = $tipoComentario;

        return $this;
    }

    public function getComentarioUsuarios(): ?Usuarios
    {
        return $this->comentarioUsuarios;
    }

    public function setComentarioUsuarios(?Usuarios $comentarioUsuarios): static
    {
        $this->comentarioUsuarios = $comentarioUsuarios;

        return $this;
    }

    public function getComentarioTipoComentario(): ?TipoComentario
    {
        return $this->comentarioTipoComentario;
    }

    public function setComentarioTipoComentario(?TipoComentario $comentarioTipoComentario): static
    {
        $this->comentarioTipoComentario = $comentarioTipoComentario;

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

    public function getRestaurantes(): ?Restaurantes
    {
        return $this->restaurantes;
    }

    public function setRestaurantes(?Restaurantes $restaurantes): static
    {
        $this->restaurantes = $restaurantes;

        return $this;
    }
}
