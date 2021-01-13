<?php

namespace App\Form;

use App\Entity\Borrower;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrowerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('mail')
            ->add('phone')
            ->add('login')
            ->add('password')
            ->add('flag')
            ->add('card')
            ->add('borrowers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Borrower::class,
        ]);
    }
}
