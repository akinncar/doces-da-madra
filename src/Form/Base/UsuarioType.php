<?php

namespace App\Form\Base;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                'constraints' => array(new Length(array('min' => 2, 'max' => 60))),
                'attr' => [
                    'placeholder' => 'Informe o seu nome',
                    'class' => 'form-control'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => "E-mail",
                'constraints' => array(new Length(array('min' => 3, 'max' => 60))),
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
                'attr' => [
                    'class' => 'form-control cpf',
                    'placeholder' => 'Informe seu cpf',
                ]
            ])

            ->add('telefone', TextType::class, [
                'label' => "Telefone",
                'constraints' => array(new Length(array('min' => 8, 'max' => 25))),
                'attr' => [
                    'placeholder' => 'Informe seu telefone para contato',
                    'class' => 'form-control telefone'
                ]
            ])

            ->add('telefone2', TextType::class, [
                'required' => false,
                'label' => "Segundo Telefone",
                'attr' => [
                    'placeholder' => 'Informe um contato reserva',
                    'class' => 'form-control telefone'
                ]
            ])

            ->add('estado', TextType::class, [
                'label' => "Estado",
                'constraints' => array(new Length(array('min' => 2, 'max' => 2))),
                'attr' => [
                    'placeholder' => 'Informe seu telefone para contato',
                    'class' => 'form-control estado'
                ]
            ])

            ->add('cidade', TextType::class, [
                'label' => "Cidade",
                'constraints' => array(new Length(array('min' => 2, 'max' => 20))),
                'attr' => [
                    'placeholder' => 'Informe sua cidade',
                    'class' => 'form-control'
                ]
            ])

            ->add('rua', TextType::class, [
                'label' => "Rua",
                'constraints' => array(new Length(array('min' => 4, 'max' => 30))),
                'attr' => [
                    'placeholder' => 'Informe sua rua',
                    'class' => 'form-control'
                ]
            ])

            ->add('bairro', TextType::class, [
                'label' => "Bairro",
                'constraints' => array(new Length(array('min' => 4, 'max' => 20))),
                'attr' => [
                    'placeholder' => 'Informe seu bairro',
                    'class' => 'form-control'
                ]
            ])

            ->add('cep', TextType::class, [
                'label' => "CEP",
                'constraints' => array(new Length(array('min' => 6, 'max' => 25))),
                'attr' => [
                    'placeholder' => 'Informe o seu CEP',
                    'class' => 'form-control cep',
                ]
            ])

            ->add('complemento', TextType::class, [
                'label' => "Complemento",
                'attr' => [
                    'placeholder' => 'Informe o complemento de sua residência',
                    'class' => 'form-control'
                ]
            ])

            ->add('num_residencia', TextType::class, [
                'label' => "Número Residencial",
                'constraints' => array(new Length(array('min' => 1, 'max' => 5))),
                'attr' => [
                    'placeholder' => 'Informe o número de sua residência',
                    'class' => 'form-control nr'
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
                    'class' => 'waves-effect waves-light btn blue'
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
