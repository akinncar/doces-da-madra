<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 16:05
 */

namespace App\Controller\Usuario;

use App\Entity\Usuario;
use App\Form\Base\UsuarioType;
// use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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
}
