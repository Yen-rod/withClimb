<?php

namespace App\Entity;

use App\Repository\FotoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FotoRepository::class)]
class Fotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUsuario = null;

    #[ORM\Column]
    private ?int $idTipoFoto = null;

    #[ORM\Column]
    private ?int $idFotografiado = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaSubida = null;

    #[ORM\ManyToOne(inversedBy: 'fotos')]
    private ?Usuarios $fotoUsuario = null;

    #[ORM\ManyToOne(inversedBy: 'viaFotos')]
    private ?Vias $vias = null;

    #[ORM\ManyToOne(inversedBy: 'tipofotoFotos')]
    private ?TipoFoto $fotoTipoFoto = null;

    #[ORM\ManyToOne(inversedBy: 'restauranteFotos')]
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

    public function getIdTipoFoto(): ?int
    {
        return $this->idTipoFoto;
    }

    public function setIdTipoFoto(int $idTipoFoto): static
    {
        $this->idTipoFoto = $idTipoFoto;

        return $this;
    }

    public function getIdFotografiado(): ?int
    {
        return $this->idFotografiado;
    }

    public function setIdFotografiado(int $idFotografiado): static
    {
        $this->idFotografiado = $idFotografiado;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaSubida(): ?\DateTimeInterface
    {
        return $this->fechaSubida;
    }

    public function setFechaSubida(\DateTimeInterface $fechaSubida): static
    {
        $this->fechaSubida = $fechaSubida;

        return $this;
    }

    public function getFotoUsuario(): ?Usuarios
    {
        return $this->fotoUsuario;
    }

    public function setFotoUsuario(?Usuarios $fotoUsuario): static
    {
        $this->fotoUsuario = $fotoUsuario;

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

    public function getFotoTipoFoto(): ?TipoFoto
    {
        return $this->fotoTipoFoto;
    }

    public function setFotoTipoFoto(?TipoFoto $fotoTipoFoto): static
    {
        $this->fotoTipoFoto = $fotoTipoFoto;

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
