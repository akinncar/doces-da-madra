<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2265B05D3E3E11F0", columns={"cpf"}), @ORM\UniqueConstraint(name="UNIQ_2265B05DE7927C74", columns={"email"})})
 * @ORM\Entity
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=180, nullable=false, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=120, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=15, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=25, nullable=false)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone2", type="string", length=25, nullable=true)
     */
    private $telefone2;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=20, nullable=false)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="rua", type="string", length=30, nullable=false)
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=20, nullable=false)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=20, nullable=false)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=20, nullable=false)
     */
    private $complemento;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_residencia", type="string", length=5, nullable=false)
     */
    private $numResidencia;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_recuperacao", type="string", nullable=true)
     */
    private $codigoRecuperacao;

    /**
     * @return string
     */
    public function getCodigoRecuperacao(): string
    {
        return $this->codigoRecuperacao;
    }

    /**
     * @param string $codigoRecuperacao
     * @return Usuario
     */
    public function setCodigoRecuperacao(string $codigoRecuperacao)
    {
        $this->codigoRecuperacao = $codigoRecuperacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataRecuperacao(): \DateTime
    {
        return $this->dataRecuperacao;
    }

    /**
     * @param \DateTime $dataRecuperacao
     * @return Usuario
     */
    public function setDataRecuperacao(\DateTime $dataRecuperacao): Usuario
    {
        $this->dataRecuperacao = $dataRecuperacao;
        return $this;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_recuperacao", type="date", nullable=true)
     */
    private $dataRecuperacao;

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     * @return Usuario
     */
    public function setEstado(string $estado): Usuario
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     * @return Usuario
     */
    public function setCidade(string $cidade): Usuario
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param string $rua
     * @return Usuario
     */
    public function setRua(string $rua): Usuario
    {
        $this->rua = $rua;
        return $this;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     * @return Usuario
     */
    public function setBairro(string $bairro): Usuario
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     * @return Usuario
     */
    public function setCep(string $cep): Usuario
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param string $complemento
     * @return Usuario
     */
    public function setComplemento(string $complemento): Usuario
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumResidencia()
    {
        return $this->numResidencia;
    }

    /**
     * @param int $numResidencia
     * @return Usuario
     */
    public function setNumResidencia(int $numResidencia): Usuario
    {
        $this->numResidencia = $numResidencia;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone2()
    {
        return $this->telefone2;
    }

    /**
     * @param string $telefone2
     * @return Usuario
     */
    public function setTelefone2(string $telefone2): Usuario
    {
        $this->telefone2 = $telefone2;
        return $this;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $roles = 'ROLE_USER';

    public function getRoles()
    {
        return [$this->roles];

    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Usuario
     */
    public function setNome(string $nome): Usuario
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return Usuario
     */
    public function setCpf(string $cpf): Usuario
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     * @return Usuario
     */
    public function setTelefone(string $telefone): Usuario
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Usuario
     */
    public function setEmail(string $email): Usuario
    {
        $this->email = $email;
        return $this;
    }

}
