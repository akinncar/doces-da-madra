<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Usuario as Usuario;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="fk_id_usuario", columns={"id_usuario"})})
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="date", nullable=false)
     */
    private $dataCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_criacao", type="time", nullable=false)
     */
    private $horaCriacao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $valor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obs", type="string", length=255, nullable=true)
     */
    private $obs;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Pedido
     */
    public function setId(int $id): Pedido
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacao(): \DateTime
    {
        return $this->dataCriacao;
    }

    /**
     * @param \DateTime $dataCriacao
     * @return Pedido
     */
    public function setDataCriacao(\DateTime $dataCriacao): Pedido
    {
        $this->dataCriacao = $dataCriacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getHoraCriacao(): \DateTime
    {
        return $this->horaCriacao;
    }

    /**
     * @param \DateTime $horaCriacao
     * @return Pedido
     */
    public function setHoraCriacao(\DateTime $horaCriacao): Pedido
    {
        $this->horaCriacao = $horaCriacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getValor(): string
    {
        return $this->valor;
    }

    /**
     * @param string $valor
     * @return Pedido
     */
    public function setValor(string $valor): Pedido
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getObs(): ?string
    {
        return $this->obs;
    }

    /**
     * @param string|null $obs
     * @return Pedido
     */
    public function setObs(?string $obs): Pedido
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getIdUsuario(): Usuario
    {
        return $this->idUsuario;
    }

    /**
     * @param Usuario $idUsuario
     * @return Pedido
     */
    public function setIdUsuario(Usuario $idUsuario): Pedido
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

}
