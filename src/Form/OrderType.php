<?php

namespace App\Form;

use App\Entity\Orders;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('taxnumber',TextType::class)
            ->add('productid',EntityType::class, array(
                'label' => 'Продукт',
                'class' => Products::class,
                'choice_label' => 'Name',
                'choice_value'=>'id',
                'attr'=>['class'=>'w-50 ml-auto mr-auto custom-select d-block']
            ))
            ->add('productprice')
            ->add('fullprice')
            ->add('save', SubmitType::class,array(
                'label'=>'Заказать',
                'attr'=>['class'=>'ml-auto mr-auto btn btn-outline-success d-block']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
