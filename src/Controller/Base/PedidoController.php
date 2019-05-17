<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-05-09
 * Time: 20:30
 */

namespace App\Controller\Base;

use App\Entity\ItemPedido;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\VarDumper\VarDumper;

class PedidoController extends AbstractController
{
    /**
     *
     * @Route("/pedido/{id}", name="pedido")
     * @Template("base/pedido.html.twig")
     * @param integer $id
     * @return array
     */
    public function viewPedido($id)
    {
        $itensPedido = $this->getDoctrine()
            ->getRepository(ItemPedido::class)
            ->listItensPedido($id);
//
//        VarDumper::dump($itensPedido);
//        die;

        return [
            'itensPedido' => $itensPedido,
        ];
    }
}