<?php

namespace App\Controller;

use App\Form\Base\QuantidadeType;
use App\Repository\QtdReplyForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produto;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\VarDumper\VarDumper;

class DefaultController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/", name="default")
     * @Template("index.html.twig")
     */
    public function index(Request $request, $idProduto = 0) {
        $form = $this->createForm(QuantidadeType::class);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $produtos = $em->getRepository(Produto::class)->findAll();

        if ($form->isSubmitted()) {

            VarDumper::dump( $this->session->set($idProduto, $form["qtd"]->getData()));
            VarDumper::dump( $this->session->get($idProduto));
            VarDumper::dump( $this->session->all() );
            VarDumper::dump('deu certo');
            die;

            return $this->redirectToRoute('carrinho');
        }

        return[
            'produtos' => $produtos,
            'form'=> $form->createView(),
        ];
    }

}
