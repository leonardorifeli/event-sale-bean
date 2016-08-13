<?php

namespace SaleProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product', null, [
              'label' => 'Produto',
              'attr' => [
                'class' => 'form-control'
              ]
            ])
            ->add('quantity', null, [
              'label' => 'Quantidade',
              'attr' => [
                'class' => 'form-control'
              ]
            ])
            ->add('value', null, [
              'label' => 'Valor pago',
              'attr' => [
                'class' => 'form-control'
              ]
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SaleProductBundle\Entity\Sale'
        ));
    }
}
