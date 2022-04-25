<?php

namespace App\Form;

use App\Entity\Category;
use App\Model\Search;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Formulaire de recherche sur la page produits
 */
class SearchType extends AbstractType
{

    /**
     * Permet de paraméter un formulaire custom
     *
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
            ->add('string', TextType::class, [
                'label' => 'Keywords:',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Your research'
                ]
            ])
            ->add('categories', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'submit',
                'attr' => [
                    'class' => 'btn btn-outline-info w-100'
                ]
            ])
        ;
    }

    public function getBlockPrefix(): string {
        return '';
    }
}
