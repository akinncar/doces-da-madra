<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 16:05
 */

namespace App\Controller\Usuario;

use App\Entity\Produto;
use App\Form\Base\QuantidadeType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;

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
        $currentSession = array();

        $em = $this->getDoctrine()->getManager();

        $currentSession = $this->session->all();
        $currentSessionKey = array_keys($currentSession);

        foreach ( $currentSessionKey as $produto) {
            $objProduto = $em->getRepository(Produto::class)->find($produto);
            if ($objProduto !== null) {
                $carrinhoArray[] = $objProduto;
            }
        }

        return[
            'produtos' => $carrinhoArray,
            'qtd_produtos' => $currentSession,
        ];
    }

    /**
     * @Route("/adicionar-ao-carrinho/{idProduto}", name="adicionar_carrinho")
     * @Template("helpers/quantidade.html.twig")
     */
    public function adicionar(Request $request, $idProduto = 0) {
//        $form = $this->createForm(QuantidadeType::class);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted()) {
//
//            VarDumper::dump( $this->session->set($idProduto, 30));
//            VarDumper::dump('deu certo');
//            die;
//
//            return $this->redirectToRoute('carrinho');
//        }
//
//        VarDumper::dump($request->getMethod());
//        VarDumper::dump('n deu certo');
//        die;

//        return [
//            'form' => $form->createView()
//        ];
    }

    /**
     * @Route("/remover_do_carrinho/{idProduto}", name="remover_carrinho")
     */
    public function remover($idProduto) {
        $this->session->remove($idProduto);

        return $this->redirectToRoute('carrinho');
    }
}
