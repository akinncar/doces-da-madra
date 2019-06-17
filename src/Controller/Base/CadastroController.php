<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 16:05
 */

namespace App\Controller\Base;

use App\Entity\Usuario;
use App\Form\Base\UsuarioType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\VarDumper\VarDumper;

class CadastroController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param Request $request
     *
     * @Route("/cadastro", name="cadastrar_usuario")
     * @Template("base/cadastro.html.twig")
     * @return array
     */
    public function create(Request $request, \Swift_Mailer $mailer)
    {
        $user = new Usuario();
        $form = $this->createForm(UsuarioType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encripitando a senha
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                $user->getPassword()
            ));

            $em = $this->getDoctrine()->getManager();

            try {
                $em->persist($user);
                $em->flush();

                $message = (new \Swift_Message('Doces da Madra: Recuperar Senha'))
                    ->setFrom('akinncar@gmail.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                        'Bem-vindo(a) '.$user->getNome().', você realizou seu cadastro no site Doces da Madra, agora você está habilitado a fazer encomendas entrando no sistema com seu nome de usuário('.$user->getUsername().'), e com a senha que você utilizou no cadastro!'
                    );

                $mailer->send($message);

                return $this->redirectToRoute('app_login');
            } catch(\Doctrine\DBAL\DBALException $e) {
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Suas informações não são validas ou já foram cadastradas!'
                );
            }

        }

        return [
            'form' => $form->createView()
        ];
    }
}
