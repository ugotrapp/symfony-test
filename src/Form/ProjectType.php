<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Client;
use App\Entity\Student;
use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('deadline')
            ->add('budget')
            
            
            
            ->add('clients', EntityType::class, [
                'class' => Client::class,
                'choice_label' => function(Client $client) {
                    return "{$client->getFirstname()} {$client->getLastname()}";
                },
                'multiple' => true, //c'est quand la relation est many
                'expanded' => true, // c'est pur cocher plusieurs cases mais je suis pas sur
            ])
            
            //->add('tags')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
