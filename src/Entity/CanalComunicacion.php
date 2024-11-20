<?php

namespace App\Entity;

use App\Repository\CanalComunicacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CanalComunicacionRepository::class)]
class CanalComunicacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaCreacion = null;

    /**
     * @var Collection<int, Usuarios>
     */
    #[ORM\ManyToMany(targetEntity: Usuarios::class, mappedBy: 'canales')]
    private Collection $canalUsuario;

    /**
     * @var Collection<int, MiembroCanal>
     */
    #[ORM\OneToMany(targetEntity: MiembroCanal::class, mappedBy: 'canalComunicacion')]
    private Collection $miembros;

    /**
     * @var Collection<int, MiembroCanal>
     */
    #[ORM\OneToMany(targetEntity: MiembroCanal::class, mappedBy: 'canal')]
    private Collection $miembroCanals;

    public function __construct()
    {
        $this->canalUsuario = new ArrayCollection();
        $this->miembros = new ArrayCollection();
        $this->miembroCanals = new ArrayCollection();
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

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): static
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * @return Collection<int, Usuarios>
     */
    public function getUsuarios(): Collection
    {
        return $this->canalUsuario;
    }

    public function addUsuario(Usuarios $canalUsuario): static
    {
        if (!$this->canalUsuario->contains($canalUsuario)) {
            $this->canalUsuario->add($canalUsuario);
            $canalUsuario->addCanal($this);
        }

        return $this;
    }

    public function removeUsuario(Usuarios $canalUsuario): static
    {
        if ($this->canalUsuario->removeElement($canalUsuario)) {
            $canalUsuario->removeCanal($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MiembroCanal>
     */
    public function getMiembros(): Collection
    {
        return $this->miembros;
    }

    public function addMiembro(MiembroCanal $miembro): static
    {
        if (!$this->miembros->contains($miembro)) {
            $this->miembros->add($miembro);
            $miembro->setCanalComunicacion($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroCanal $miembro): static
    {
        if ($this->miembros->removeElement($miembro)) {
            // set the owning side to null (unless already changed)
            if ($miembro->getCanalComunicacion() === $this) {
                $miembro->setCanalComunicacion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MiembroCanal>
     */
    public function getMiembroCanals(): Collection
    
    {
        return $this->miembroCanals;
    }

    public function addMiembroCanal(MiembroCanal $miembroCanal): static
    {
        if (!$this->miembroCanals->contains($miembroCanal)) {
            $this->miembroCanals->add($miembroCanal);
            $miembroCanal->setCanal($this);
        }

        return $this;
    }

    public function removeMiembroCanal(MiembroCanal $miembroCanal): static
    {
        if ($this->miembroCanals->removeElement($miembroCanal)) {
            // set the owning side to null (unless already changed)
            if ($miembroCanal->getCanal() === $this) {
                $miembroCanal->setCanal(null);
            }
        }

        return $this;
    }
}
