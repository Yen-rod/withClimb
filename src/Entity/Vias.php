<?php

namespace App\Entity;

use App\Repository\ViasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ViasRepository::class)]
class Vias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idBloque = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $gradoDificultad = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(nullable: true)]
    private ?int $totalAscensos = null;

    #[ORM\ManyToOne(inversedBy: 'vias')]
    private ?Bloques $viaBloque = null;

    /**
     * @var Collection<int, Comentarios>
     */
    #[ORM\OneToMany(targetEntity: Comentarios::class, mappedBy: 'vias')]
    private Collection $viaComentarios;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'vias')]
    private Collection $viaFotos;

    /**
     * @var Collection<int, Ascensos>
     */
    #[ORM\OneToMany(targetEntity: Ascensos::class, mappedBy: 'via')]
    private Collection $ascensos;

    public function __construct()
    {
        $this->viaComentarios = new ArrayCollection();
        $this->viaFotos = new ArrayCollection();
        $this->ascensos = new ArrayCollection();
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

    public function getIdBloque(): ?int
    {
        return $this->idBloque;
    }

    public function setIdBloque(int $idBloque): static
    {
        $this->idBloque = $idBloque;

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

    public function getGradoDificultad(): ?string
    {
        return $this->gradoDificultad;
    }

    public function setGradoDificultad(?string $gradoDificultad): static
    {
        $this->gradoDificultad = $gradoDificultad;

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

    public function getTotalAscensos(): ?int
    {
        return $this->totalAscensos;
    }

    public function setTotalAscensos(?int $totalAscensos): static
    {
        $this->totalAscensos = $totalAscensos;

        return $this;
    }



    public function getViaBloque(): ?Bloques
    {
        return $this->viaBloque;
    }

    public function setViaBloque(?Bloques $viaBloque): static
    {
        $this->viaBloque = $viaBloque;

        return $this;
    }

    /**
     * @return Collection<int, Comentarios>
     */
    public function getViaComentarios(): Collection
    {
        return $this->viaComentarios;
    }

    public function addViaComentario(Comentarios $viaComentario): static
    {
        if (!$this->viaComentarios->contains($viaComentario)) {
            $this->viaComentarios->add($viaComentario);
            $viaComentario->setVias($this);
        }

        return $this;
    }

    public function removeViaComentario(Comentarios $viaComentario): static
    {
        if ($this->viaComentarios->removeElement($viaComentario)) {
            // set the owning side to null (unless already changed)
            if ($viaComentario->getVias() === $this) {
                $viaComentario->setVias(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fotos>
     */
    public function getViaFotos(): Collection
    {
        return $this->viaFotos;
    }

    public function addViaFoto(Fotos $viaFoto): static
    {
        if (!$this->viaFotos->contains($viaFoto)) {
            $this->viaFotos->add($viaFoto);
            $viaFoto->setVias($this);
        }

        return $this;
    }

    public function removeViaFoto(Fotos $viaFoto): static
    {
        if ($this->viaFotos->removeElement($viaFoto)) {
            // set the owning side to null (unless already changed)
            if ($viaFoto->getVias() === $this) {
                $viaFoto->setVias(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ascensos>
     */
    public function getAscensos(): Collection
    {
        return $this->ascensos;
    }

    public function addAscenso(Ascensos $ascenso): static
    {
        if (!$this->ascensos->contains($ascenso)) {
            $this->ascensos->add($ascenso);
            $ascenso->setVia($this);
        }

        return $this;
    }

    public function removeAscenso(Ascensos $ascenso): static
    {
        if ($this->ascensos->removeElement($ascenso)) {
            // set the owning side to null (unless already changed)
            if ($ascenso->getVia() === $this) {
                $ascenso->setVia(null);
            }
        }

        return $this;
    }
}