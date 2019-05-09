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
    public function index() {
        $em = $this->getDoctrine()->getManager();
        $produtos = $em->getRepository(Produto::class)->findAll();

        return[
            'produtos' => $produtos,
        ];
    }

}
