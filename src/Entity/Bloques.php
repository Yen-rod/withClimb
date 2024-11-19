<?php

namespace App\Entity;

use App\Repository\BloquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloquesRepository::class)]
class Bloques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idZona = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne(inversedBy: 'zonaBloques')]
    private ?Zonas $zonas = null;

    #[ORM\ManyToOne(inversedBy: 'bloques')]
    private ?Zonas $bloqueZonas = null;

    /**
     * @var Collection<int, Vias>
     */
    #[ORM\OneToMany(targetEntity: Vias::class, mappedBy: 'bloques')]
    private Collection $bloqueVias;

    /**
     * @var Collection<int, Vias>
     */
    #[ORM\OneToMany(targetEntity: Vias::class, mappedBy: 'viasBloque')]
    private Collection $vias;

    public function __construct()
    {
        $this->bloqueVias = new ArrayCollection();
        $this->vias = new ArrayCollection();
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

    public function getIdZona(): ?int
    {
        return $this->idZona;
    }

    public function setIdZona(int $idZona): static
    {
        $this->idZona = $idZona;

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

    public function getZonas(): ?Zonas
    {
        return $this->zonas;
    }

    public function setZonas(?Zonas $zonas): static
    {
        $this->zonas = $zonas;

        return $this;
    }

    public function getBloqueZonas(): ?Zonas
    {
        return $this->bloqueZonas;
    }

    public function setBloqueZonas(?Zonas $bloqueZonas): static
    {
        $this->bloqueZonas = $bloqueZonas;

        return $this;
    }

    /**
     * @return Collection<int, Vias>
     */
    public function getBloqueVias(): Collection
    {
        return $this->bloqueVias;
    }

    public function addBloqueVia(Vias $bloqueVia): static
    {
        if (!$this->bloqueVias->contains($bloqueVia)) {
            $this->bloqueVias->add($bloqueVia);
            $bloqueVia->setBloques($this);
        }

        return $this;
    }

    public function removeBloqueVia(Vias $bloqueVia): static
    {
        if ($this->bloqueVias->removeElement($bloqueVia)) {
            // set the owning side to null (unless already changed)
            if ($bloqueVia->getBloques() === $this) {
                $bloqueVia->setBloques(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vias>
     */
    public function getVias(): Collection
    {
        return $this->vias;
    }

    public function addVia(Vias $via): static
    {
        if (!$this->vias->contains($via)) {
            $this->vias->add($via);
            $via->setViasBloque($this);
        }

        return $this;
    }

    public function removeVia(Vias $via): static
    {
        if ($this->vias->removeElement($via)) {
            // set the owning side to null (unless already changed)
            if ($via->getViasBloque() === $this) {
                $via->setViasBloque(null);
            }
        }

        return $this;
    }
}
