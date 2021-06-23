<?php

namespace App\Form;

use\App\Entity\Tag;
use App\Entity\Teacher;
use App\Entity\SchoolYear;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SchoolYearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('startDate')
            ->add('endDate')
            ->add('teachers', EntityType::class, [
                'class' => Teacher::class,
                'choice_label' => function(Teacher $teacher) {
                    return "{$teacher->getFirstname()} {$teacher->getLastname()}";
                }
            ]);

            
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SchoolYear::class,

        ]);
    }
}
