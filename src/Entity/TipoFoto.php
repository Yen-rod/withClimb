<?php

namespace App\Entity;

use App\Repository\TipoFotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoFotoRepository::class)]
class TipoFoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'tipoFoto')]
    private Collection $tipofotoFotos;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'fotosTipoFoto')]
    private Collection $fotos;

    public function __construct()
    {
        $this->tipofotoFotos = new ArrayCollection();
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
     * @return Collection<int, Fotos>
     */
    public function getTipofotoFotos(): Collection
    {
        return $this->tipofotoFotos;
    }

    public function addTipofotoFoto(Fotos $tipofotoFoto): static
    {
        if (!$this->tipofotoFotos->contains($tipofotoFoto)) {
            $this->tipofotoFotos->add($tipofotoFoto);
            $tipofotoFoto->setTipoFoto($this);
        }

        return $this;
    }

    public function removeTipofotoFoto(Fotos $tipofotoFoto): static
    {
        if ($this->tipofotoFotos->removeElement($tipofotoFoto)) {
            // set the owning side to null (unless already changed)
            if ($tipofotoFoto->getTipoFoto() === $this) {
                $tipofotoFoto->setTipoFoto(null);
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

    public function addFoto(Fotos $foto): static
    {
        if (!$this->fotos->contains($foto)) {
            $this->fotos->add($foto);
            $foto->setFotosTipoFoto($this);
        }

        return $this;
    }

    public function removeFoto(Fotos $foto): static
    {
        if ($this->fotos->removeElement($foto)) {
            // set the owning side to null (unless already changed)
            if ($foto->getFotosTipoFoto() === $this) {
                $foto->setFotosTipoFoto(null);
            }
        }

        return $this;
    }
}
