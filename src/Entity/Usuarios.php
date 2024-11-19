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
    #[ORM\OneToMany(targetEntity: Ascensos::class, mappedBy: 'usuarios')]
    private Collection $ascensos;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'usuarios')]
    private Collection $fotos;

    /**
     * @var Collection<int, CanalComunicacion>
     */
    #[ORM\ManyToMany(targetEntity: CanalComunicacion::class, inversedBy: 'usuarios')]
    private Collection $canales;

    /**
     * @var Collection<int, MiembroCanal>
     */
    #[ORM\OneToMany(targetEntity: MiembroCanal::class, mappedBy: 'usuarios')]
    private Collection $miembrosCanal;

    /**
     * @var Collection<int, MiembroCanal>
     */
    #[ORM\OneToMany(targetEntity: MiembroCanal::class, mappedBy: 'usuario')]
    private Collection $miembroCanals;

    /**
     * @var Collection<int, Comentarios>
     */
    #[ORM\OneToMany(targetEntity: Comentarios::class, mappedBy: 'comentarioUsuarios')]
    private Collection $comentariosUsuarios;

    /**
     * @var Collection<int, Ascensos>
     */
    #[ORM\OneToMany(targetEntity: Ascensos::class, mappedBy: 'ascensosUsuario')]
    private Collection $ascensosUsuario;

    /**
     * @var Collection<int, Fotos>
     */
    #[ORM\OneToMany(targetEntity: Fotos::class, mappedBy: 'fotosUsuario')]
    private Collection $fotosUsuario;

    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
        $this->ascensos = new ArrayCollection();
        $this->fotos = new ArrayCollection();
        $this->canales = new ArrayCollection();
        $this->miembrosCanal = new ArrayCollection();
        $this->miembroCanals = new ArrayCollection();
        $this->comentariosUsuarios = new ArrayCollection();
        $this->ascensosUsuario = new ArrayCollection();
        $this->fotosUsuario = new ArrayCollection();
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
            $ascenso->setUsuarios($this);
        }

        return $this;
    }

    public function removeAscenso(Ascensos $ascenso): static
    {
        if ($this->ascensos->removeElement($ascenso)) {
            // set the owning side to null (unless already changed)
            if ($ascenso->getUsuarios() === $this) {
                $ascenso->setUsuarios(null);
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
            $foto->setUsuarios($this);
        }

        return $this;
    }

    public function removeFoto(Fotos $foto): static
    {
        if ($this->fotos->removeElement($foto)) {
            // set the owning side to null (unless already changed)
            if ($foto->getUsuarios() === $this) {
                $foto->setUsuarios(null);
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

    public function addCanale(CanalComunicacion $canale): static
    {
        if (!$this->canales->contains($canale)) {
            $this->canales->add($canale);
        }

        return $this;
    }

    public function removeCanale(CanalComunicacion $canale): static
    {
        $this->canales->removeElement($canale);

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
            $miembrosCanal->setUsuarios($this);
        }

        return $this;
    }

    public function removeMiembrosCanal(MiembroCanal $miembrosCanal): static
    {
        if ($this->miembrosCanal->removeElement($miembrosCanal)) {
            // set the owning side to null (unless already changed)
            if ($miembrosCanal->getUsuarios() === $this) {
                $miembrosCanal->setUsuarios(null);
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
            $miembroCanal->setUsuario($this);
        }

        return $this;
    }

    public function removeMiembroCanal(MiembroCanal $miembroCanal): static
    {
        if ($this->miembroCanals->removeElement($miembroCanal)) {
            // set the owning side to null (unless already changed)
            if ($miembroCanal->getUsuario() === $this) {
                $miembroCanal->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comentarios>
     */
    public function getComentariosUsuarios(): Collection
    {
        return $this->comentariosUsuarios;
    }

    public function addComentariosUsuario(Comentarios $comentariosUsuario): static
    {
        if (!$this->comentariosUsuarios->contains($comentariosUsuario)) {
            $this->comentariosUsuarios->add($comentariosUsuario);
            $comentariosUsuario->setComentarioUsuarios($this);
        }

        return $this;
    }

    public function removeComentariosUsuario(Comentarios $comentariosUsuario): static
    {
        if ($this->comentariosUsuarios->removeElement($comentariosUsuario)) {
            // set the owning side to null (unless already changed)
            if ($comentariosUsuario->getComentarioUsuarios() === $this) {
                $comentariosUsuario->setComentarioUsuarios(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ascensos>
     */
    public function getAscensosUsuario(): Collection
    {
        return $this->ascensosUsuario;
    }

    public function addAscensosUsuario(Ascensos $ascensosUsuario): static
    {
        if (!$this->ascensosUsuario->contains($ascensosUsuario)) {
            $this->ascensosUsuario->add($ascensosUsuario);
            $ascensosUsuario->setAscensosUsuario($this);
        }

        return $this;
    }

    public function removeAscensosUsuario(Ascensos $ascensosUsuario): static
    {
        if ($this->ascensosUsuario->removeElement($ascensosUsuario)) {
            // set the owning side to null (unless already changed)
            if ($ascensosUsuario->getAscensosUsuario() === $this) {
                $ascensosUsuario->setAscensosUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fotos>
     */
    public function getFotosUsuario(): Collection
    {
        return $this->fotosUsuario;
    }

    public function addFotosUsuario(Fotos $fotosUsuario): static
    {
        if (!$this->fotosUsuario->contains($fotosUsuario)) {
            $this->fotosUsuario->add($fotosUsuario);
            $fotosUsuario->setFotosUsuario($this);
        }

        return $this;
    }

    public function removeFotosUsuario(Fotos $fotosUsuario): static
    {
        if ($this->fotosUsuario->removeElement($fotosUsuario)) {
            // set the owning side to null (unless already changed)
            if ($fotosUsuario->getFotosUsuario() === $this) {
                $fotosUsuario->setFotosUsuario(null);
            }
        }

        return $this;
    }
}
