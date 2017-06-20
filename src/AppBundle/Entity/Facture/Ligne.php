<?php

namespace AppBundle\Entity\Facture;

use AppBundle\Entity\Facture;
use AppBundle\Entity\TVA;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne.
 *
 * @author Marc EYMARD <contact@marc-eymard.fr>
 *
 * @ORM\Entity
 */
class Ligne
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var Facture
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Facture", inversedBy="lignes")
     */
    protected $facture;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    protected $description;

    /**
     * @var float
     *
     * @ORM\Column(name="quantite", type="float", nullable=false)
     */
    protected $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", nullable=false)
     */
    protected $prix;

    /**
     * @var TVA
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TVA")
     * @ORM\JoinColumn(name="tva", referencedColumnName="tva")
     */
    protected $tva;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get facture.
     *
     * @return Facture
     */
    public function getFacture(): Facture
    {
        return $this->facture;
    }

    /**
     * Set facture.
     *
     * @param Facture $facture
     *
     * @return Ligne
     */
    public function setFacture(Facture $facture): Ligne
    {
        $this->facture = $facture;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Ligne
     */
    public function setDescription(string $description): Ligne
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get quantite.
     *
     * @return float
     */
    public function getQuantite(): float
    {
        return $this->quantite;
    }

    /**
     * Set quantite.
     *
     * @param float $quantite
     *
     * @return Ligne
     */
    public function setQuantite(float $quantite): Ligne
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get prix.
     *
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * Set prix.
     *
     * @param float $prix
     *
     * @return Ligne
     */
    public function setPrix(float $prix): Ligne
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get tva.
     *
     * @return TVA
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set tva.
     *
     * @param TVA $tva
     *
     * @return Ligne
     */
    public function setTva(TVA $tva): TVA
    {
        $this->tva = $tva;

        return $this;
    }
}
