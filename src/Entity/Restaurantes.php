<?php

namespace App\Entity;

use App\Repository\RestaurantesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantesRepository::class)]
class Restaurantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idZonas = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $ubicacion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contacto = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne(inversedBy: 'restaurantes')]
    private ?Zonas $zonaRestaurante = null;

    /**
     * @var Collection<int, Comentarios>
     */
    #[ORM\OneToMany(targetEntity: Comentarios::class, mappedBy: 'restaurantes')]
    private Collection $comentarios;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'restaurantes')]
    private Collection $fotos;

    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
        $this->fotos = new ArrayCollection();
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

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): static
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getContacto(): ?string
    {
        return $this->contacto;
    }

    public function setContacto(?string $contacto): static
    {
        $this->contacto = $contacto;

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

    public function getZonaRestaurante(): ?Zonas
    {
        return $this->zonaRestaurante;
    }

    public function setZonaRestaurante(?Zonas $zonaRestaurante): static
    {
        $this->zonaRestaurante = $zonaRestaurante;

        return $this;
    }

    public function addComentarios(Comentarios $comentarios): static
    {
        if (!$this->comentarios->contains($comentarios)) {
            $this->comentarios->add($comentarios);
            $comentarios->setRestaurantes($this);
        }

        return $this;
    }

    public function removeComentarios(Comentarios $comentarios): static
    {
        if ($this->comentarios->removeElement($comentarios)) {
            // set the owning side to null (unless already changed)
            if ($comentarios->getRestaurantes() === $this) {
                $comentarios->setRestaurantes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fotos>
     */
    public function getFotos(): Collection
    {
        return $this->fotos;
    }

    public function fotos(Fotos $fotos): static
    {
        if (!$this->fotos->contains($fotos)) {
            $this->fotos->add($fotos);
            $fotos->setRestaurantes($this);
        }

        return $this;
    }

    public function removeFoto(Fotos $fotos): static
    {
        if ($this->fotos->removeElement($fotos)) {
            // set the owning side to null (unless already changed)
            if ($fotos->getRestaurantes() === $this) {
                $fotos->setRestaurantes(null);
            }
        }

        return $this;
    }
}
