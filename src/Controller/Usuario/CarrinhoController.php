<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 16:05
 */

namespace App\Controller\Usuario;

use App\Entity\ItemPedido;
use App\Entity\Pedido;
use App\Entity\Produto;
use App\Form\Base\QuantidadeType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Usuario\CarrinhoType;

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
    public function index(Request $request) {
        $produtosDoCarrinho = array();
        $currentSession = array();
        $total = 0;

        date_default_timezone_set('America/Sao_Paulo');

        $pedido = new Pedido();
        $pedido->setDataEntrega(new \DateTime(date('d-m-Y')));
        $pedido->setHoraEntrega(new \DateTime(date('H:i:s')));
        $form = $this->createForm(CarrinhoType::class, $pedido);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $currentSession = $this->session->all();
        $currentSessionKey = array_keys($currentSession);

        foreach ($currentSession as $key => $pdt) {
            $aux = $em->getRepository(Produto::class)->find($key);
            $aux ? ($total += ( $aux->getPrecoVenda() *  $pdt )) : null;
        }

        foreach ( $currentSessionKey as $produto) {
            $objProduto = $em->getRepository(Produto::class)->find($produto);
            if ($objProduto !== null) {
                $produtosDoCarrinho[] = $objProduto;
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $produtosDoCarrinho = array();
            $currentSession = array();
            $valorFinal = 0;

            $em = $this->getDoctrine()->getManager();

            $currentSession = $this->session->all();
            $currentSessionKey = array_keys($currentSession);

            foreach ( $currentSessionKey as $produto ) {
                $objProduto = $em->getRepository(Produto::class)->find($produto);
                if ($objProduto !== null) {
                    $produtosDoCarrinho[] = $objProduto;
                }
            }

            // Inserir tabela Pedidos


            $pedido->setIdUsuario($this->getUser());
            $pedido->setDataCriacao(new \DateTime(date('d-m-Y')));
            $pedido->setHoraCriacao(new \DateTime(date('H:i:s')));
            $pedido->setStatus('1');
            $pedido->setValor(00.00);

            $em->persist($pedido);
            $em->flush();

            // Inserir tabela item_pedidos

            foreach ( $produtosDoCarrinho as $produto ) {
                $qtdItem = $currentSession[$produto->getId()];
                $valorItem = floatval($produto->getPrecoVenda()) * floatval($qtdItem);

                $itemPedido = new ItemPedido();
                $itemPedido->setIdProduto($produto);
                $itemPedido->setQtdItemPedido($qtdItem);
                $itemPedido->setIdPedido($pedido);
                $itemPedido->setPreco($valorItem);

                $valorFinal += $valorItem;

                $em->persist($itemPedido);
                $em->flush();
            }

            $pedido = $pedido->setValor($valorFinal);

            $em = $this->getDoctrine()->getManager();

            $em->persist($pedido);
            $em->flush();

            $this->session->clear();

            return $this->redirectToRoute('pedidos_user');

        }

//        VarDumper::dump($currentSession);
//        VarDumper::dump($currentSession[17]);
//        die;

//        foreach($produtosDoCarrinho as $prod) {
//            VarDumper::dump('fwqfq');
//            VarDumper::dump($prod);
//            while (list($key, $value) = each($currentSession)) {
////                VarDumper::dump('produto');
////                VarDumper::dump($prod);
////                VarDumper::dump('session ');
////                VarDumper::dump(key($currentSession));
//                if ($prod->getId() == $key) {
//                    VarDumper::dump(floatval($prod->getPrecoVenda()));
//                    VarDumper::dump(floatval($currentSession[$prod->getId()]));
//                    $total += ((floatval($prod->getPrecoVenda())) * floatval($currentSession[$prod->getId()]));
//                }
//            }
//        }
//
//        VarDumper::dump($total);
//        die;

        return[
            'produtos' => $produtosDoCarrinho,
            'qtd_produtos' => $currentSession,
            'total' => $total,
            'form'=> $form->createView(),
        ];
    }

    /**
     * @Route("/adicionar-ao-carrinho/{idProduto}", name="adicionar_carrinho")
     * @param integer $idProduto
     */
    public function adicionar(Request $request, $idProduto = 0 , $qtdProduto = 0) {
        $idProduto = intval($idProduto);
        $qtdProduto = intval($request->query->get('qtdProduto'));

        $this->session->set($idProduto, $qtdProduto);

        return $this->redirectToRoute('carrinho');
    }

    /**
     * @Route("/remover_do_carrinho/{idProduto}", name="remover_carrinho")
     */
    public function remover($idProduto) {
        $this->session->remove($idProduto);

        return $this->redirectToRoute('carrinho');
    }

    /**
     * @Route("/finalizar-pedido/{obs}", name="finalizar_pedido")
     * @param string $obs
     */
    public function finalizarPedido($obs = "Nenhuma Observação foi adicionada") {
//        $produtosDoCarrinho = array();
//        $currentSession = array();
//        $valorFinal = 0;
//
//        $em = $this->getDoctrine()->getManager();
//
//        $currentSession = $this->session->all();
//        $currentSessionKey = array_keys($currentSession);
//
//        foreach ( $currentSessionKey as $produto ) {
//            $objProduto = $em->getRepository(Produto::class)->find($produto);
//            if ($objProduto !== null) {
//                $produtosDoCarrinho[] = $objProduto;
//            }
//        }
//
//        // Inserir tabela Pedidos
//
//        $pedido = new Pedido();
//
//        $pedido->setIdUsuario($this->getUser());
//        $pedido->setDataCriacao(new \DateTime(date('d-m-Y')));
//        $pedido->setHoraCriacao(new \DateTime(date('H:i:s')));
//        $pedido->setArquivado('N');
//        $pedido->setStatus('1');
//        $pedido->setObs($obs);
//        $pedido->setValor(00.00);
//
//        $em->persist($pedido);
//        $em->flush();
//
//        // Inserir tabela item_pedidos
//
//        foreach ( $produtosDoCarrinho as $produto ) {
//            $qtdItem = $currentSession[$produto->getId()];
//            $valorItem = floatval($produto->getPrecoVenda()) * floatval($qtdItem);
//
//            $itemPedido = new ItemPedido();
//            $itemPedido->setIdProduto($produto);
//            $itemPedido->setQtdItemPedido($qtdItem);
//            $itemPedido->setIdPedido($pedido);
//            $itemPedido->setPreco($valorItem);
//
//            $valorFinal += $valorItem;
//
//            $em->persist($itemPedido);
//            $em->flush();
//        }
//
//        $pedido = $pedido->setValor($valorFinal);
//
//        $em->persist($pedido);
//        $em->flush();
//
//
//        $this->session->clear();
//
//        return $this->redirectToRoute('default');
    }
}
