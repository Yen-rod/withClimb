<?php

namespace App\Entity;

use App\Enum\Genero;
use App\Enum\Nivel;
use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $totalAscensos = null;

    #[ORM\Column(nullable: true, enumType: Genero::class)]
    private ?Genero $genero = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true, enumType: Nivel::class)]
    private ?array $nivelExperiencia = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechaRegistro = null;

    /**
     * @var Collection<int, Comentarios>
     */
    #[ORM\OneToMany(targetEntity: Comentarios::class, mappedBy: 'comentarioUsuario')]
    private Collection $comentarios;

    /**
     * @var Collection<int, Ascensos>
     */
    #[ORM\OneToMany(targetEntity: Ascensos::class, mappedBy: 'ascensoUsuario')]
    private Collection $ascensos;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'fotoUsuario')]
    private Collection $fotos;

    /**
     * @var Collection<int, CanalComunicacion>
     */
    #[ORM\ManyToMany(targetEntity: CanalComunicacion::class, inversedBy: 'canalUsuario')]
    private Collection $canales;

    /**
     * @var Collection<int, MiembroCanal>
     */
    #[ORM\OneToMany(targetEntity: MiembroCanal::class, mappedBy: 'miembroUsuario')]
    private Collection $miembrosCanal;


    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
        $this->ascensos = new ArrayCollection();
        $this->fotos = new ArrayCollection();
        $this->canales = new ArrayCollection();
        $this->miembrosCanal = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

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

    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    public function setGenero(?Genero $genero): static
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * @return Nivel[]|null
     */
    public function getNivelExperiencia(): ?array
    {
        return $this->nivelExperiencia;
    }

    public function setNivelExperiencia(?array $nivelExperiencia): static
    {
        $this->nivelExperiencia = $nivelExperiencia;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $fechaRegistro): static
    {
        $this->fechaRegistro = $fechaRegistro;

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
            $comentario->setComentarioUsuario($this);
        }

        return $this;
    }

    public function removeComentario(Comentarios $comentario): static
    {
        if ($this->comentarios->removeElement($comentario)) {
            // set the owning side to null (unless already changed)
            if ($comentario->getComentarioUsuario() === $this) {
                $comentario->setComentarioUsuario(null);
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
            $ascenso->setAscensoUsuario($this);
            

        }

        return $this;
    }

    public function removeAscenso(Ascensos $ascenso): static
    {
        if ($this->ascensos->removeElement($ascenso)) {
            // set the owning side to null (unless already changed)
            if ($ascenso->getAscensoUsuario() === $this) {
                $ascenso->setAscensoUsuario(null);
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
            $foto->setFotoUsuario($this);
        }

        return $this;
    }

    public function removeFoto(Fotos $foto): static
    {
        if ($this->fotos->removeElement($foto)) {
            // set the owning side to null (unless already changed)
            if ($foto->getFotoUsuario() === $this) {
                $foto->setFotoUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CanalComunicacion>
     */
    public function getCanales(): Collection
    {
        return $this->canales;
    }

    public function addCanal(CanalComunicacion $canal): static
    {
        if (!$this->canales->contains($canal)) {
            $this->canales->add($canal);
        }

        return $this;
    }

    public function removeCanal(CanalComunicacion $canal): static
    {
        $this->canales->removeElement($canal);

        return $this;
    }

    /**
     * @return Collection<int, MiembroCanal>
     */
    public function getMiembrosCanal(): Collection
    {
        return $this->miembrosCanal;
    }

    public function addMiembrosCanal(MiembroCanal $miembrosCanal): static
    {
        if (!$this->miembrosCanal->contains($miembrosCanal)) {
            $this->miembrosCanal->add($miembrosCanal);
            $miembrosCanal->setMiembroUsuario($this);
        }

        return $this;
    }

    public function removeMiembrosCanal(MiembroCanal $miembrosCanal): static
    {
        if ($this->miembrosCanal->removeElement($miembrosCanal)) {
            // set the owning side to null (unless already changed)
            if ($miembrosCanal->getMiembroUsuario() === $this) {
                $miembrosCanal->setMiembroUsuario(null);
            }
        }

        return $this;
    }

}
