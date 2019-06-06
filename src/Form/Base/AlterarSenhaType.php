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


class AlterarSenhaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
