<?php

namespace App\Form\Base;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => "Nome Completo",
                'constraints' => array(new Length(array('min' => 6, 'max' => 14))),
                'attr' => [
                    'placeholder' => 'Informe o seu nome',
                    'class' => 'form-control'
                ]
            ])

            ->add('email', TextType::class, [
                'label' => "E-mail",
                'constraints' => array(new Length(array('min' => 6, 'max' => 60))),
                'attr' => [
                    'placeholder' => 'Informe o seu e-mail',
                    'class' => 'form-control'
                ]
            ])

            ->add('username', TextType::class, [
                'label' => "Usuário",
                'constraints' => array(new Length(array('min' => 6, 'max' => 14))),
                'attr' => [
                    'placeholder' => 'Informe o nome de Usuário',
                    'class' => 'form-control'
                ]
            ])

            ->add('username', TextType::class, [
                'label' => "Usuário",
                'constraints' => array(new Length(array('min' => 6, 'max' => 14))),
                'attr' => [
                    'placeholder' => 'Informe o nome de usuário',
                    'class' => 'form-control'
                ]
            ])

            ->add('cpf', TextType::class, [
                'label' => "CPF",
                'constraints' => array(new Length(array('min' => 6, 'max' => 14))),
                'attr' => [
                    'placeholder' => 'Informe seu cpf',
                    'class' => 'form-control'
                ]
            ])

            ->add('telefone', NumberType::class, [
                'label' => "Telefone",
                'constraints' => array(new Length(array('min' => 6, 'max' => 14))),
                'attr' => [
                    'placeholder' => 'Informe seu telefone para contato',
                    'class' => 'form-control'
                ]
            ])

//            ->add('password', PasswordType::class, [
//                'label' => "Senha",
//                'attr' => [
//                    'placeholder' => 'Informe a senha',
//                    'class' => 'form-control'
//                ]
//            ])

            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('attr' => array('class' => 'form-control')),
                'required' => true,
                'constraints' => array(new Length(array('min' => 6, 'max' => 14))),
                'first_options'  => array('label' => 'Senha', 'attr' => ['placeholder' => 'Informe a senha para seu usuário']),
                'second_options' => array('label' => 'Confirmar senha', 'attr' => ['placeholder' => 'Digite novamente a senha informada acima']),
                'invalid_message' => 'As senhas não conferem',
            ))

            ->add('salvar', SubmitType::class, [
                'label' => 'Cadastrar',
                'attr' => [
                    'class' => 'waves-effect waves-light btn'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
