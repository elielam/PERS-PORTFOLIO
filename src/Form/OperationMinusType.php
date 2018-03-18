<?php

namespace App\Form;

use App\Entity\OperationMinus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationMinusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class, array(
                'label'  => 'Operation Libelle',
            ))
            ->add('datetime', TextType::class, array(
                'label'  => 'Operation Date',
            ))
            ->add('sum', TextType::class, array(
                'label'  => 'Operation Sum',
            ))
            ->add('isDebit', TextType::class, array(
                'label'  => 'Operation is debit',
            ))
            ->add('save', SubmitType::class, array('label' => 'Update Operation'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => OperationMinus::class,
        ]);
    }
}
