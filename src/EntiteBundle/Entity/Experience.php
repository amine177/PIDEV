<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience", indexes={@ORM\Index(name="IDX_590C103FB88E14F", columns={"utilisateur_id"}), @ORM\Index(name="IDX_590C103FF631228", columns={"etablissement_id"})})
 * @ORM\Entity
 */
class Experience
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Utilisateur",inversedBy="experiences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * })
     */
    private $utilisateur;

    /**
     * @var \Etablissement
     *
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Etablissement",inversedBy="experiences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id")
     * })
     */
    private $etablissement;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set utilisateur.
     *
     * @param \EntiteBundle\Entity\Utilisateur|null $utilisateur
     *
     * @return Experience
     */
    public function setUtilisateur(\EntiteBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur.
     *
     * @return \EntiteBundle\Entity\Utilisateur|null
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set etablissement.
     *
     * @param \EntiteBundle\Entity\Etablissement|null $etablissement
     *
     * @return Experience
     */
    public function setEtablissement(\EntiteBundle\Entity\Etablissement $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement.
     *
     * @return \EntiteBundle\Entity\Etablissement|null
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }
}
