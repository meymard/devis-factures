<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * TVA.
 *
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
 * @ApiResource
 * @ORM\Entity
 */
class TVA
{

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float", nullable=false)
     * @ORM\Id
     */
    protected $tva;

    /**
     * Get tva.
     *
     * @return float
     */
    public function getTva(): float
    {
        return $this->tva;
    }

    /**
     * Set tva.
     *
     * @param float $tva
     *
     * @return TVA
     */
    public function setTva(float $tva): TVA
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf('%s %%', number_format($this->getTva(), 2, ',', ' '));
    }
}
