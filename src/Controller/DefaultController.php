<?php

namespace App\Controller;

use App\Form\Base\QuantidadeType;
use App\Repository\QtdReplyForm;
use MySQLDump;
use mysqli;
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
    public function index() {
        $em = $this->getDoctrine()->getManager();
        $produtos = $em->getRepository(Produto::class)->findBy(['arquivado' => '0']);
        $produtosArquivados = $em->getRepository(Produto::class)->findBy(['arquivado' => '1']);

        return[
            'produtos' => $produtos,
            'produtosArquivados' => $produtosArquivados,
        ];
    }

    /**
     * @Route("/arquivar/{id}", name="arquivar")
     */
    public function arquivar($id = 0) {
        $em = $this->getDoctrine()->getManager();
        $produto = $em->getRepository(Produto::class)->findOneBy(['id' => $id]);
        if ($produto->getArquivado() === '0') {
            $produto->setArquivado('1');
        } else {
            $produto->setArquivado('0');
        }
        $em->persist($produto);
        $em->flush();

        return $this->redirectToRoute('default');
    }
}
