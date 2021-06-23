<?php

namespace App\Form;

use App\Entity\User;

use App\Entity\SchoolYear;
use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('schoolYears', EntityType::class, [
                'class' => SchoolYear::class,
                'choice_label' => function(SchoolYear $schoolYear) {
                    return "{$schoolYear->getName()}";
                },
                'multiple' => true, //c'est quand la relation est many
                'expanded' => true, // c'est pur cocher plusieurs cases mais je suis pas sur
            ])
            //->add('tags')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
