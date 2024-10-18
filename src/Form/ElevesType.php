<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Eleves;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElevesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_eleve')
            ->add('prenom_eleve')
            ->add('date_naissance_eleve', null, [
                'widget' => 'single_text',
            ])
            ->add('classe', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleves::class,
        ]);
    }
}
