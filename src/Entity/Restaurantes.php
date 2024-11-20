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
    private Collection $restauranteComentarios;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'restaurantes')]
    private Collection $restauranteFotos;

    public function __construct()
    {
        $this->restauranteComentarios = new ArrayCollection();
        $this->restauranteFotos = new ArrayCollection();
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

    public function addRestauranteComentario(Comentarios $restauranteComentario): static
    {
        if (!$this->restauranteComentarios->contains($restauranteComentario)) {
            $this->restauranteComentarios->add($restauranteComentario);
            $restauranteComentario->setRestaurantes($this);
        }

        return $this;
    }

    public function removeRestauranteComentario(Comentarios $restauranteComentario): static
    {
        if ($this->restauranteComentarios->removeElement($restauranteComentario)) {
            // set the owning side to null (unless already changed)
            if ($restauranteComentario->getRestaurantes() === $this) {
                $restauranteComentario->setRestaurantes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fotos>
     */
    public function getRestauranteFotos(): Collection
    {
        return $this->restauranteFotos;
    }

    public function addRestauranteFoto(Fotos $restauranteFoto): static
    {
        if (!$this->restauranteFotos->contains($restauranteFoto)) {
            $this->restauranteFotos->add($restauranteFoto);
            $restauranteFoto->setRestaurantes($this);
        }

        return $this;
    }

    public function removeRestauranteFoto(Fotos $restauranteFoto): static
    {
        if ($this->restauranteFotos->removeElement($restauranteFoto)) {
            // set the owning side to null (unless already changed)
            if ($restauranteFoto->getRestaurantes() === $this) {
                $restauranteFoto->setRestaurantes(null);
            }
        }

        return $this;
    }
}
