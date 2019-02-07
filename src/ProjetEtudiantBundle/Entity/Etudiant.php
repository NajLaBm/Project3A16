<?php

namespace ProjetEtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="ProjetEtudiantBundle\Repository\EtudiantRepository")
 */
class Etudiant
{
    /**
     * @var int
     *
     * @ORM\Column(name="matricule", type="integer")
     * @ORM\Id
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="numclasse", type="string", length=255)
     */
    private $numclasse;

    /**
     * @ORM\ManyToOne(targetEntity="ProjetEtudiantBundle\Entity\Projet")
     * @ORM\JoinColumn(name="IdProjet", referencedColumnName="id")
     */
    private $projet;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Etudiant
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set numclasse
     *
     * @param string $numclasse
     *
     * @return Etudiant
     */
    public function setNumclasse($numclasse)
    {
        $this->numclasse = $numclasse;

        return $this;
    }

    /**
     * Get numclasse
     *
     * @return string
     */
    public function getNumclasse()
    {
        return $this->numclasse;
    }

    /**
     * @return int
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param int $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * @param mixed $projet
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;
    }


}

