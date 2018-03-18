<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class, array(
                'label'  => 'Account Name',
            ))
            ->add('type', TextType::class, array(
                'label'  => 'Account Type',
            ))
            ->add('balance', TextType::class, array(
                'label'  => 'Account Balance',
            ))
            ->add('interestDraft', TextType::class, array(
                'label'  => 'Account Interest draft rate',
            ))
            ->add('overdraft', TextType::class, array(
                'label'  => 'Account Overdraft',
            ))
            ->add('save', SubmitType::class, array('label' => 'Update Account'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Account::class,
        ]);
    }
}
