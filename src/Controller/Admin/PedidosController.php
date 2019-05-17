<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-05-09
 * Time: 20:30
 */

namespace App\Controller\Admin;

use App\Entity\Pedido;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PedidosController extends AbstractController
{
    /**
     *
     * @Route("/pedidos-geral", name="pedidos_admin")
     * @Template("admin/pedidos.html.twig")
     * @return array
     */
    public function listarPedidosAdmin()
    {
        $pedidos = $this->getDoctrine()
            ->getRepository(Pedido::class)
            ->findPedidosAdmin();

        return [
            'pedidos' => $pedidos,
        ];
    }
}