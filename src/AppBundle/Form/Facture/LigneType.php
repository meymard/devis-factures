<?php

namespace AppBundle\Form\Facture;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Ligne de Facture.
 *
 * @uses AbstractType
 * @author Marc EYMARD <m.eymard@mgo-consulting.com>
 */
class LigneType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('quantite')
            ->add('prix')
            ->add('tva', EntityType::class, [
                'class' => 'AppBundle:TVA',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options)
    {
        return [
            'data_class' => 'AppBundle\Entity\Facture\Ligne'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'facture_ligne';
    }
}

