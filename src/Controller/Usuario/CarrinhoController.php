<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 16:05
 */

namespace App\Controller\Usuario;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;

class CarrinhoController extends AbstractController
{
    /**
     * @Route("/carrinho", name="carrinho")
     * @Template("usuario/carrinho.html.twig")
     */
    public function index() {
        return[];
    }

    /**
     * @Route("/adicionar-ao-carrinho/{idProduto}", name="adicionar_carrinho")
     */
    public function adicionar(Security $security, $idProduto) {
        $idUsuario = $security->getUser()->getId();

        VarDumper::dump('id do user');
        VarDumper::dump($idUsuario);
        VarDumper::dump('id do produto');
        VarDumper::dump(intval($idProduto));
        die;

        return $this->redirectToRoute('default');
    }
}
