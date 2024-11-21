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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comentario = null;

    #[ORM\Column(nullable: true)]
    private ?int $puntuacion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?Usuarios $idUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?TipoComentario $idTipoComentario = null;

    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?Vias $vias = null;

    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?Restaurantes $restaurantes = null;

    /* 
    #[ORM\ManyToOne(inversedBy: 'comentarios')]
    private ?Usuarios $comentarioUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'tipoComentarios')]
    private ?TipoComentario $tipoComentario = null;

    #[ORM\ManyToOne(inversedBy: 'viaComentarios')]
    private ?Vias $vias = null;
    */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getIdUsuario(): ?Usuarios
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?Usuarios $idUsuario): static
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdTipoComentario(): ?TipoComentario
    {
        return $this->idTipoComentario;
    }

    public function setIdTipoComentario(?TipoComentario $idTipoComentario): static
    {
        $this->idTipoComentario = $idTipoComentario;

        return $this;
    }

    
    public function getvias(): ?Vias
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
        return $this->vias;
    }

    public function setRestaurantes(?Restaurantes $restaurantes): static
    {
        $this->restaurantes = $restaurantes;

        return $this;
    }

}
