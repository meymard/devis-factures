<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Facture.
 *
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
 * @ApiResource
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"facture" = "Facture", "devis" = "Devis"})
 */
class Facture extends FactureAbstract
{
}
