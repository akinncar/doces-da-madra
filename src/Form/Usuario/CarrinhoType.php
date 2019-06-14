<?php

namespace App\Form\Usuario;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;


class CarrinhoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('metodo_entrega', ChoiceType::class, [
                'required' => 'true',
                'label' => 'Método de Entrega',
               'choices' => [
                   'Entrega a domicílio' => 1,
                   'Retirar no local' => 2,
               ],
               'attr' => [
                   'placeholder' => 'Selecione',
                   'class' => 'browser-default'
               ]
           ])

            ->add('data_entrega', DateType::class, [
                'required' => 'true',
                'label' => 'Data da Entrega',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datepicker'
                ]
            ])

            ->add('hora_entrega', TimeType::class, [
                'required' => 'true',
                'label' => 'Horário da Entrega (Brasília)',
                'widget' => 'single_text',
                'attr' => [
                ]
            ])

            ->add('obs', TextareaType::class, [
                'required' => false,
                'label' => "Observação",
                'constraints' => array(new Length(array('min' => 0, 'max' => 250))),
                'attr' => [
                    'placeholder' => 'Observações sobre seu pedido',
                    'class' => 'materialize-textarea'
                ]
            ])

            ->add('salvar', SubmitType::class, [
                'label' => 'Finalizar Pedido',
                'attr' => [
                    'class' => 'waves-effect waves-light btn green'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
        ]);
    }
}
