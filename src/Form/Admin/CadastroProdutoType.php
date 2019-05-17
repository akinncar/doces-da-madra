<?php

namespace App\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class CadastroProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => "Nome do Produto",
                'attr' => [
                    'placeholder' => 'Informe o seu nome',
                    'class' => 'form-control'
                ]
            ])

            ->add('precoCusto', MoneyType::class, [
                'currency' => 'BRL',
                'label' => "Preço de Custo (Formato: 99,99) ",
                'attr' => [
                    'placeholder' => 'Informe o preço de custo',
                    'class' => 'form-control'
                ]
            ])

            ->add('precoVenda', MoneyType::class, [
                'currency' => 'BRL',
                'label' => "Preço de Venda (Formato: 99,99) ",
                'attr' => [
                    'placeholder' => 'Informe o preço de venda',
                    'class' => 'form-control'
                ]
            ])

            ->add('qtdProduto', IntegerType::class, [
                'label' => "Quantidade de estoque",
                'attr' => [
                    'placeholder' => 'Informe a quantidade atual',
                    'class' => 'form-control'
                ]
            ])

            ->add('descricao', TextType::class, [
                'label' => "Descrição",
                'attr' => [
                    'placeholder' => 'Descreva o Produto',
                    'class' => 'form-control'
                ]
            ])

            ->add('img', FileType::class, [
                'label' => 'Imagem do doce ',
                'attr' => [
                    'class' => 'file-field input-field'
                ]
            ])

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
