<?php

namespace App\Form;

use App\Entity\OperationPlus;
use App\Entity\PaymentCategory;
use App\Repository\PaymentCategoryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationPlusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityManager = $options['entity_manager'];
        $paymentCategoriesRepo = $entityManager->getRepository(PaymentCategory::class);

        $paymentCategoriesName = $paymentCategoriesRepo->findAllPaymentCategoriesName();
        $builder
            ->add('libelle', TextType::class, array(
                'label'  => 'Operation Libelle',
            ))
            ->add('sum', TextType::class, array(
                'label'  => 'Operation Sum',
            ))
            ->add('category', ChoiceType::class, array(
                'label'  => 'Operation Category',
                'choices'  => $paymentCategoriesName,
            ))
            ->add('isCredit', ChoiceType::class, array(
                'label'  => 'Operation is credit',
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                ),
            ));
            if($options['data']->getId() === null) {
                $builder
                    ->add('datetime', DateTimeType::class, array(
                        'label'  => false,
                        'data' => new \DateTime()
                    ))
                    ->add('save', SubmitType::class, array('label' => 'Add Operation'));
            } else {
                $builder
                    ->add('datetime', DateTimeType::class, array(
                        'label'  => false
                    ))
                    ->add('save', SubmitType::class, array('label' => 'Update Operation'));
            }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => OperationPlus::class,
        ]);
        $resolver->setRequired('entity_manager');
    }
}
