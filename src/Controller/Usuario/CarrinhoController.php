<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 16:05
 */

namespace App\Controller\Usuario;

use App\Entity\Produto;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;

class CarrinhoController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/carrinho", name="carrinho")
     * @Template("usuario/carrinho.html.twig")
     */
    public function index() {
        $carrinhoArray = array();
        $sessionActual = array();

        $em = $this->getDoctrine()->getManager();

        $sessionActual = $this->session->all();
        $sessionActualKey = array_keys($sessionActual);

        foreach ( $sessionActualKey as $produto) {
            $objProduto = $em->getRepository(Produto::class)->find($produto);
            if ($objProduto !== null) {
                $carrinhoArray[] = $objProduto;
            }
        }

        return[
            'produtos' => $carrinhoArray,
            'qtd_produtos' => $sessionActual,
        ];
    }

    /**
     * @Route("/adicionar-ao-carrinho/{idProduto}", name="adicionar_carrinho")
     */
    public function adicionar($idProduto) {
        $this->session->set($idProduto, 30);

        return $this->redirectToRoute('carrinho');
    }

    /**
     * @Route("/remover_do_carrinho/{idProduto}", name="remover_carrinho")
     */
    public function remover($idProduto) {
        $this->session->remove($idProduto);

        return $this->redirectToRoute('carrinho');
    }
}
