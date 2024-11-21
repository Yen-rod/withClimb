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


    #[ORM\OneToMany(targetEntity: UsuariosCanalComunicacion::class, mappedBy: 'idCanalComunicacion')]
    private $usuariosCanalComunicacion;

    /*
     @var Collection<int, Usuarios>
    #[ORM\ManyToMany(targetEntity: Usuarios::class, mappedBy: 'canales')]
    private Collection $canalUsuario;
      @var Collection<int, MiembroCanal>
    #[ORM\OneToMany(targetEntity: UsuariosCanalComunicacion::class, mappedBy: 'canalComunicacion')]
    private Collection $miembros;
     @var Collection<int, MiembroCanal>
    #[ORM\OneToMany(targetEntity: UsuariosCanalComunicacion::class, mappedBy: 'canal')]
    private Collection $miembroCanals;
    */


    public function __construct()
    {

        $this->usuariosCanalComunicacion = new ArrayCollection();
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
     * @return Collection<int, MiembroCanal>
     */
    public function getUsuariosCanalComunicacion(): Collection
    
    {
        return $this->usuariosCanalComunicacion;
    }

    public function addUsuariosCanalComunicacion(UsuariosCanalComunicacion $usuariosCanalComunicacion): static
    {
        if (!$this->usuariosCanalComunicacion->contains($usuariosCanalComunicacion)) {
            $this->usuariosCanalComunicacion->add($usuariosCanalComunicacion);
            $usuariosCanalComunicacion->setIdCanalComunicacion($this);
        }

        return $this;
    }

    public function removeUsuariosCanalComunicacion(UsuariosCanalComunicacion $usuariosCanalComunicacion): static
    {
        if ($this->usuariosCanalComunicacion->removeElement($usuariosCanalComunicacion)) {
            // set the owning side to null (unless already changed)
            if ($usuariosCanalComunicacion->getIdCanalComunicacion() === $this) {
                $usuariosCanalComunicacion->setIdCanalComunicacion(null);
            }
        }

        return $this;
    }
}
