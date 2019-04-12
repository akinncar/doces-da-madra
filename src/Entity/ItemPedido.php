<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemPedido
 *
 * @ORM\Table(name="item_pedido")
 * @ORM\Entity
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
     * @ORM\Column(name="id_pedido", type="integer", nullable=false)
     */
    private $idPedido;

    /**
     * @var int
     *
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     */
    private $idProduto;

    /**
     * @var int
     *
     * @ORM\Column(name="qtd", type="integer", nullable=false)
     */
    private $qtd;


}
