<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-05-09
 * Time: 20:30
 */

namespace App\Controller\Base;

use App\Entity\Pedido;
use App\Entity\Produto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PedidosController extends AbstractController
{
    /**
     *
     * @Route("/pedidos", name="pedidos_user")
     * @Template("usuario/pedidos.html.twig")
     * @return array
     */
    public function listarPedidosUsuario()
    {
        $em = $this->getDoctrine()->getManager();
        $pedidos = $em->getRepository(Pedido::class)->findBy(['idUsuario' => $this->getUser()->getId()]);

        return [
            'pedidos' => $pedidos,
        ];
    }
}