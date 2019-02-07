<?php

namespace EspritParcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="EspritParcBundle\Repository\VoitureRepository")
 */
class Voiture
{

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=255)
     */
    private $serie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemc", type="date")
     */
    private $datemc;

    /**
     * @ORM\ManyToOne(targetEntity="EspritParcBundle\Entity\Modele")
     * @ORM\JoinColumn(name="IdModel", referencedColumnName="id")
     */
    private $modele;


    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return Voiture
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set serie
     *
     * @param string $serie
     *
     * @return Voiture
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set datemc
     *
     * @param \DateTime $datemc
     *
     * @return Voiture
     */
    public function setDatemc($datemc)
    {
        $this->datemc = $datemc;

        return $this;
    }

    /**
     * Get datemc
     *
     * @return \DateTime
     */
    public function getDatemc()
    {
        return $this->datemc;
    }

    /**
     * Set modele
     *
     * @param \EspritParcBundle\Entity\Modele $modele
     *
     * @return Voiture
     */
    public function setModele(\EspritParcBundle\Entity\Modele $modele = null)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return \EspritParcBundle\Entity\Modele
     */
    public function getModele()
    {
        return $this->modele;
    }
}
