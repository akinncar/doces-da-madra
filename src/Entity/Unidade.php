<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidade
 *
 * @ORM\Table(name="unidade")
 * @ORM\Entity
 */
class Unidade
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
     * @var int|null
     *
     * @ORM\Column(name="qtd", type="integer", nullable=true)
     */
    private $qtd;

    /**
     * @var int|null
     *
     * @ORM\Column(name="desconto", type="integer", nullable=true)
     */
    private $desconto;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Unidade
     */
    public function setId(int $id): Unidade
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQtd(): ?int
    {
        return $this->qtd;
    }

    /**
     * @param int|null $qtd
     * @return Unidade
     */
    public function setQtd(?int $qtd): Unidade
    {
        $this->qtd = $qtd;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDesconto(): ?int
    {
        return $this->desconto;
    }

    /**
     * @param int|null $desconto
     * @return Unidade
     */
    public function setDesconto(?int $desconto): Unidade
    {
        $this->desconto = $desconto;
        return $this;
    }


}
