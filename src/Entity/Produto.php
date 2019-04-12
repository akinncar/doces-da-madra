<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity
 */
class Produto
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
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=60, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=260, nullable=false)
     */
    private $descricao;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img", type="string", length=260, nullable=true)
     */
    private $img;


}
