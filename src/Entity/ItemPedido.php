<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Pedido as Pedido;
use App\Entity\Produto as Produto;

/**
 * ItemPedido
 *
 * @ORM\Table(name="item_pedido", indexes={@ORM\Index(name="fk_id_produto", columns={"id_produto"}), @ORM\Index(name="fk_id_pedido", columns={"id_pedido"})})
 * @ORM\Entity(repositoryClass="App\Repository\ItemPedidoRepository")
 */
class ItemPedido
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
     * @var int
     *
     * @ORM\Column(name="qtd_item_pedido", type="integer", nullable=false)
     */
    private $qtdItemPedido;

    /**
     * @var string
     *
     * @ORM\Column(name="preco", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $preco;

    /**
     * @var Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     * })
     */
    private $idPedido;

    /**
     * @var Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id")
     * })
     */
    private $idProduto;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ItemPedido
     */
    public function setId(int $id): ItemPedido
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getQtdItemPedido(): int
    {
        return $this->qtdItemPedido;
    }

    /**
     * @param int $qtdItemPedido
     * @return ItemPedido
     */
    public function setQtdItemPedido(int $qtdItemPedido): ItemPedido
    {
        $this->qtdItemPedido = $qtdItemPedido;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreco(): string
    {
        return $this->preco;
    }

    /**
     * @param string $preco
     * @return ItemPedido
     */
    public function setPreco(string $preco): ItemPedido
    {
        $this->preco = $preco;
        return $this;
    }

    /**
     * @return Pedido
     */
    public function getIdPedido(): Pedido
    {
        return $this->idPedido;
    }

    /**
     * @param Pedido $idPedido
     * @return ItemPedido
     */
    public function setIdPedido(Pedido $idPedido): ItemPedido
    {
        $this->idPedido = $idPedido;
        return $this;
    }

    /**
     * @return Produto
     */
    public function getIdProduto(): Produto
    {
        return $this->idProduto;
    }

    /**
     * @param Produto $idProduto
     * @return ItemPedido
     */
    public function setIdProduto(Produto $idProduto): ItemPedido
    {
        $this->idProduto = $idProduto;
        return $this;
    }


}
