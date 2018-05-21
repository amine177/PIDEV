<?php

namespace EntiteBundle\Form;

use Doctrine\ORM\EntityRepository;
use EntiteBundle\Repository\GouvernoratRepository;
use EntiteBundle\Repository\VilleRepository;
use ProfilBundle\Controller\GouvernoratController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EtablissementType extends AbstractType
{
    /**
     * EtablissementType constructor.
     */
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('nom')
            ->add('photo',FileType::class,array('data_class'=>null))
            ->add('adresse')
            ->add('description')
            ->add('gouvernorat', EntityType::class, array(
                'class' => 'EntiteBundle\Entity\Gouvernorat',
                'choice_label' => 'name',
                'multiple' => false
            ))
            ->add('type',ChoiceType::class,
                array(
                    'choices' => array(
                        'Café' => 'cafe',
                        'Loisirs' => 'loisirs',
                        'Restaurant' => 'restaurant',
                        'Shopping' => 'shopping'
                    )))
            ->add('ville',EntityType::class,
                array(
                    'class' => 'EntiteBundle\Entity\Ville',
                    'choice_label' => 'name',
                    'multiple' => false,

            ))
            ->add('horraire', TimeType::class)
            ->add('horraireF', TimeType::class)
            ->add('longitude')
            ->add('latitude')
            ->add('Enregistrer',SubmitType::class)
            -> setMethod('POST');


        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                $data = $event->getData();
                $villes=array();
                $gouv = $data-> getGouvernorat();
                $villes = null === $gouv ? array() : $gouv->getVilles();
                $names = array_map(function ($value) {
                    return  $value['name'];
                }, $villes);

                $form->add('ville', EntityType::class,
                    array(
                        'class' => 'EntiteBundle\Entity\Ville',
                        'multiple' => false,

                ));
            }
        );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntiteBundle\Entity\Etablissement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitebundle_etablissement';
    }




}
