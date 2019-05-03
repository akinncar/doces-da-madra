<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produto;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @Template("index.html.twig")
     */
    public function index() {
        $em = $this->getDoctrine()->getManager();

        $produtos = $em->getRepository(Produto::class)->findAll();

        return[
            'produtos' => $produtos
        ];
    }

}
