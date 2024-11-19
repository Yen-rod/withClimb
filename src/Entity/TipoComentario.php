<?php

namespace App\Entity;

use App\Repository\TipoComentarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoComentarioRepository::class)]
class TipoComentario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    /**
     * @var Collection<int, Comentarios>
     */
    #[ORM\OneToMany(targetEntity: Comentarios::class, mappedBy: 'tipoComentario')]
    private Collection $tipoComentarios;

    /**
     * @var Collection<int, Comentarios>
     */
    #[ORM\OneToMany(targetEntity: Comentarios::class, mappedBy: 'comentarioTipoComentario')]
    private Collection $comentarios;

    public function __construct()
    {
        $this->tipoComentarios = new ArrayCollection();
        $this->comentarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

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

    /**
     * @return Collection<int, Comentarios>
     */
    public function getTipoComentarios(): Collection
    {
        return $this->tipoComentarios;
    }

    public function addTipoComentario(Comentarios $tipoComentario): static
    {
        if (!$this->tipoComentarios->contains($tipoComentario)) {
            $this->tipoComentarios->add($tipoComentario);
            $tipoComentario->setTipoComentario($this);
        }

        return $this;
    }

    public function removeTipoComentario(Comentarios $tipoComentario): static
    {
        if ($this->tipoComentarios->removeElement($tipoComentario)) {
            // set the owning side to null (unless already changed)
            if ($tipoComentario->getTipoComentario() === $this) {
                $tipoComentario->setTipoComentario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comentarios>
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentarios $comentario): static
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios->add($comentario);
            $comentario->setComentarioTipoComentario($this);
        }

        return $this;
    }

    public function removeComentario(Comentarios $comentario): static
    {
        if ($this->comentarios->removeElement($comentario)) {
            // set the owning side to null (unless already changed)
            if ($comentario->getComentarioTipoComentario() === $this) {
                $comentario->setComentarioTipoComentario(null);
            }
        }

        return $this;
    }
}
