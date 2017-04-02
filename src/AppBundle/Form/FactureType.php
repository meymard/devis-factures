<?php

namespace AppBundle\Form;

use AppBundle\Form\Facture\LigneType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * FactureType.
 *
 * @uses AbstractType
 * @author Marc EYMARD <m.eymard@mgo-consulting.com>
 */
class FactureType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('tva', EntityType::class, [
                'class' => 'AppBundle:TVA'
            ])
            ->add('acompte')
            ->add('acompteVal')
            ->add('reference')
            ->add('lignes', CollectionType::class, [
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'entry_type' => Facture\LigneType::class,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options)
    {
        return [
            'data_class' => 'AppBundle\Entity\Facture'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'facture';
    }
}
