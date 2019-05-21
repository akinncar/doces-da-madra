<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-05-09
 * Time: 20:30
 */

namespace App\Controller\Admin;

use App\Entity\ItemPedido;
use App\Entity\Pedido;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\VarDumper\VarDumper;

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

    /**
     *
     * @Route("/status/{id}", name="status")
     * @param Int $id
     * @return array
     */
    public function status($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pedido = $em
            ->getRepository(Pedido::class)
            ->findBy(
                ['id' => $id]
            );

        $status = intval($pedido[0]->getStatus());
        $status++;
        $status = strval($status);

        $pedido[0]->setStatus($status);

        $em->persist($pedido[0]);
        $em->flush();

        return $this->redirectToRoute('pedidos_admin');
    }

    /**
     *
     * @Route("/status-back/{id}", name="status_back")
     * @param Int $id
     * @return array
     */
    public function statusBack($id)
    {
        $em = $this->getDoctrine()->getManager();
        $pedido = $em
            ->getRepository(Pedido::class)
            ->findBy(
                ['id' => $id]
            );

        $status = intval($pedido[0]->getStatus());
        $status--;
        $status = strval($status);

        $pedido[0]->setStatus($status);

        $em->persist($pedido[0]);
        $em->flush();

        return $this->redirectToRoute('pedidos_admin');
    }
}