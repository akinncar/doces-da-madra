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

            if($this->validaCPF($user->getCpf()) == true){
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
            } else {
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Seu CPF não é válido'
                );
            };



        }

        return [
            'form' => $form->createView()
        ];
    }

    function validaCPF($cpf = null) {

        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
}
