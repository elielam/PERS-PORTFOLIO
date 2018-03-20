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
        if($options['data']->getId() === null) {
            $builder
                ->add('libelle', TextType::class, array(
                    'label' => 'Account Name',
                ))
                ->add('bic', TextType::class, array(
                    'label' => 'Account BIC',
                ))
                ->add('iban', TextType::class, array(
                    'label' => 'Account IBAN',
                ))
                ->add('balance', TextType::class, array(
                    'label' => 'Account Balance',
                ))
                ->add('interestDraft', TextType::class, array(
                    'label' => 'Account Interest draft rate',
                ))
                ->add('overdraft', TextType::class, array(
                    'label' => 'Account Overdraft',
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Save Account',
                    'attr' => ['class' => 'btn btn-primary']
                ));
        } else {
            $builder
                ->add('libelle', TextType::class, array(
                    'label' => 'Account Name',
                ))
                ->add('bic', TextType::class, array(
                    'label' => 'Account BIC',
                ))
                ->add('iban', TextType::class, array(
                    'label' => 'Account IBAN',
                ))
                ->add('balance', TextType::class, array(
                    'label' => 'Account Balance',
                ))
                ->add('interestDraft', TextType::class, array(
                    'label' => 'Account Interest draft rate',
                ))
                ->add('overdraft', TextType::class, array(
                    'label' => 'Account Overdraft',
                ))
                ->add('save', SubmitType::class, array(
                    'label' => 'Update Account',
                    'attr' => ['class' => 'btn btn-primary']
                ));
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Account::class,
        ]);
    }
}
