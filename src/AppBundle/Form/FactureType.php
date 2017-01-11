<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FactureType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('tva')
            ->add('acompte')
            ->add('acompteVal')
            ->add('reference');
    }

    public function getDefaultOptions(array $options)
    {
        return [
            'data_class' => 'AppBundle\Entity\Facture'
        ];
    }

    public function getName()
    {
        return 'facture';
    }
}
