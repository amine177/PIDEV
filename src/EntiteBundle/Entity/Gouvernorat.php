<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gouvernorat
 *
 * @ORM\Table(name="gouvernorat")
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\GouvernoratRepository")
 */
class Gouvernorat
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="EntiteBundle\Entity\Ville", mappedBy="idGouvernorat")
     */
    private $villes;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Gouvernorat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->villes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ville.
     *
     * @param \EntiteBundle\Entity\Ville $ville
     *
     * @return Gouvernorat
     */
    public function addVille(\EntiteBundle\Entity\Ville $ville)
    {
        $this->villes[] = $ville;

        return $this;
    }

    /**
     * Remove ville.
     *
     * @param \EntiteBundle\Entity\Ville $ville
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVille(\EntiteBundle\Entity\Ville $ville)
    {
        return $this->villes->removeElement($ville);
    }

    /**
     * Get villes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVilles()
    {
        return $this->villes;
    }

    public function __toString()
    {
        return $this->name;
    }

}
