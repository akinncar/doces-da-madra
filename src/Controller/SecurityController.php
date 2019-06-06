<?php
/**
 * Created by PhpStorm.
 * User: akinncar
 * Date: 2019-04-28
 * Time: 15:41
 */
namespace App\Controller;

use App\Entity\Usuario;
use App\Form\Base\AlterarSenhaType;
use App\Form\Base\UsuarioType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\VarDumper\VarDumper;

class SecurityController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {

   }

    /**
     * @Route("/solicitar-senha", name="solicitar_senha")
     * @Template("security/solicitar-senha.html.twig")
     */
    public function solicitarSenha()
    {


        return([

        ]);
    }

    /**
     * @Route("/verificar-email/{email}", name="verificar_email")
     * @Template("security/verificar-email.html.twig")
     * @param string $email
     */
    public function verificarEmail($email = '', \Swift_Mailer $mailer)
    {
        // Enviar e-mail

        $codigo = mt_rand() . rand();

        $message = (new \Swift_Message('Doces da Madra: Recuperar Senha'))
            ->setFrom('akinncar@gmail.com')
            ->setTo($email)
            ->setBody(
                'Você solicitou alteração de senha no site Doces da Madra, preencha o código recebido no campo apresentdo no site para recuperar sua senha: ' . $codigo
            );

        if ($mailer->send($message)){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(Usuario::class)->findOneBy(
                ['email' => $email]
            );

            $user->setCodigoRecuperacao($codigo);
            $user->setDataRecuperacao((new \DateTime(date('d-m-Y'))));

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('verificar_codigo');
        } else {
            return $this->redirectToRoute('default');
        };

        return([

        ]);
    }

    /**
     * @Route("/verificar-codigo/{codigo}", name="verificar_codigo")
     * @Template("security/verificar-codigo.html.twig")
     * @param string $codigo
     */
    public function verificarCodigo($codigo = 0)
    {
        if ($codigo !== 0) {
            return $this->redirectToRoute('recuperar_senha', ['codigo' => $codigo]);
        }

        return([

        ]);
    }

    /**
     * @Route("/recuperar-senha/{codigo}", name="recuperar_senha")
     * @Template("security/recuperar-senha.html.twig")
     * @param string $codigo
     */
    public function recuperarSenha($codigo = 0, Request $request)
    {
        if (($codigo != 0) && ($codigo != 1)) {
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(Usuario::class)->findOneBy(
                ['codigoRecuperacao' => $codigo]
            );

            if (!$user) {
                return $this->redirectToRoute('default');
            }

            $dataAtual = new \DateTime(date('d-m-Y'));

            if ($dataAtual != $user->getDataRecuperacao()) {
                return $this->redirectToRoute('default');
            };

            $form = $this->createForm(AlterarSenhaType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                // encripitando a senha
                $passwordEncoder =  $this->passwordEncoder;

                $user->setPassword($passwordEncoder->encodePassword(
                    $user,
                    $user->getPassword()
                ));

                $user->setCodigoRecuperacao('1');

                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('app_login');
            }
        }

        return([
            'form' => $form->createView()
        ]);
    }
}