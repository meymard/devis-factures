<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use AppBundle\Entity\Traits;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
class Facture
{
    use Traits\ContactTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * Le numéro de devis au format YY001.
     *
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=7, nullable=false)
     */
    protected $numero;

    /**
     * @var \DateTime
     * TODO // Format final :  ORM\Column(name="date", type="date", nullable=false)
     *
     * @ORM\Column(name="date", type="string", length=10, nullable=false)
     */
    protected $date;

    /**
     * @var TVA
     *
     * @ORM\Column(name="tva", type="float", nullable=false)
     */
    protected $tva;

    /**
     * Pourcentage d'acompte.
     *
     * @var float
     *
     * @ORM\Column(name="acompte", type="float", nullable=false)
     */
    protected $acompte;

    /**
     * Valeur de l'acompte.
     *
     * @var float
     *
     * @ORM\Column(name="acompte_val", type="float", nullable=false)
     */
    protected $acompteVal;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=40, nullable=false)
     */
    protected $reference;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Facture\Ligne", mappedBy="facture")
     * @ApiSubresource
     */
    protected $lignes;

    /**
     * __construct.
     */
    public function __construct()
    {
        $this->lignes = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get numero.
     *
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Set numero.
     *
     * @param string $numero
     *
     * @return Facture
     */
    public function setNumero(string $numero): Facture
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get date.
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date ?: '';
    }

    /**
     * Set date.
     *
     * @param string $date
     *
     * @return Facture
     */
    public function setDate(string $date): Facture
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get tva.
     *
     * @return float
     */
    public function getTva(): float
    {
        return $this->tva ?: 0;
    }

    /**
     * Set tva.
     *
     * @param float|TVA $tva
     *
     * @return Facture
     */
    public function setTva($tva): Facture
    {
        if ($tva instanceof TVA) {
            $this->tva = $tva->getTva();
        } elseif (is_float($tva)) {
            $this->tva = $tva;
        } else {
            throw new \Exception('TVA ou float attendu');
        }

        return $this;
    }

    /**
     * Get acompte.
     *
     * @return string
     */
    public function getAcompte(): string
    {
        return $this->acompte ?: 0;
    }

    /**
     * Set acompte.
     *
     * @param string $acompte
     *
     * @return Facture
     */
    public function setAcompte(string $acompte): Facture
    {
        $this->acompte = $acompte;

        return $this;
    }

    /**
     * Get acompteVal.
     *
     * @return float
     */
    public function getAcompteVal(): float
    {
        return $this->acompteVal ?: 0;
    }

    /**
     * Set acompteVal.
     *
     * @param float $acompteVal
     *
     * @return Facture
     */
    public function setAcompteVal(float $acompteVal): Facture
    {
        $this->acompteVal = $acompteVal;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference ?: '';
    }

    /**
     * Set reference.
     *
     * @param string $reference
     *
     * @return Facture
     */
    public function setReference(string $reference): Facture
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get lignes.
     *
     * @return Collection
     */
    public function getLignes(): Collection
    {
        return $this->lignes;
    }

    /**
     * Add ligne.
     *
     * @param Ligne $ligne
     *
     * @return FactureAbstract
     */
    public function addLigne(Ligne $ligne)
    {
        $this->lignes[] = $ligne;

        return $this;
    }

    /**
     * Remove ligne.
     *
     * @param Ligne $ligne
     */
    public function removeLigne(Ligne $ligne)
    {
        $this->lignes->removeElement($ligne);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return sprintf('%s - %s', $this->getNumero(), $this->getReference());
    }
}
