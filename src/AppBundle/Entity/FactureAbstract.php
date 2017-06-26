<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Facture.
 *
 * @author Marc EYMARD <contact@marc-eymard.fr>
 */
abstract class FactureAbstract
{
    use Traits\ContactTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * Le numéro de devis au format YY001.
     *
     * @var string
     *
     * @ORM\Column(name="num", type="string", length=5, nullable=false)
     */
    protected $numero;

    /**
     * @var \DateTime
     * TODO // Format final :  ORM\Column(name="date", type="date", nullable=false)
     *
     * @ORM\Column(name="date", type="date", nullable=false)
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
     * @ORM\Column(name="accompte", type="integer", nullable=false)
     */
    protected $acompte;

    /**
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
     * @ORM\JoinColumn(nullable=false)
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date ?: new \DateTime();
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Facture
     */
    public function setDate(\DateTime $date): Facture
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
    public function addLigne(Ligne $ligne): FactureAbstract
    {
        $ligne->setFacture($this);
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
