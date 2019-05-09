<?php

namespace App\Form\Base;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class QuantidadeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qtd', IntegerType::class, [
                'label' => false,
                'constraints' => array(new Length(array('min' => 2, 'max' => 3))),
                'attr' => [
                    'placeholder' => '15',
                    'class' => 'blue'
                ]
            ])

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
