<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TVA.
 *
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
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
     * Message d'indication à afficher sur les factures.
     *
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", nullable=true)
     */
    protected $libelle;

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
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return TVA
     */
    public function setLibelle(string $libelle): TVA
    {
        $this->libelle = $libelle;

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
