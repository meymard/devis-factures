<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Devis.
 * ORM configurer sur l'entité facture
 *
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
 * @ApiResource
 * @ORM\Entity
 */
class Devis extends Facture
{
}
