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
     * @ORM\Column(name="preco_custo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $precoCusto;

    /**
     * @var string
     *
     * @ORM\Column(name="preco_venda", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $precoVenda;

    /**
     * @var int
     *
     * @ORM\Column(name="qtd_produto", type="integer", nullable=false)
     */
    private $qtdProduto;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=false)
     */
    private $descricao;

    /**
     * @var string|null
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Produto
     */
    public function setId(int $id): Produto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Produto
     */
    public function setNome(string $nome): Produto
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrecoCusto(): string
    {
        return $this->precoCusto;
    }

    /**
     * @param string $precoCusto
     * @return Produto
     */
    public function setPrecoCusto(string $precoCusto): Produto
    {
        $this->precoCusto = $precoCusto;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrecoVenda(): string
    {
        return $this->precoVenda;
    }

    /**
     * @param string $precoVenda
     * @return Produto
     */
    public function setPrecoVenda(string $precoVenda): Produto
    {
        $this->precoVenda = $precoVenda;
        return $this;
    }

    /**
     * @return int
     */
    public function getQtdProduto(): int
    {
        return $this->qtdProduto;
    }

    /**
     * @param int $qtdProduto
     * @return Produto
     */
    public function setQtdProduto(int $qtdProduto): Produto
    {
        $this->qtdProduto = $qtdProduto;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Produto
     */
    public function setDescricao(string $descricao): Produto
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * @param string|null $img
     * @return Produto
     */
    public function setImg(?string $img): Produto
    {
        $this->img = $img;
        return $this;
    }


}
