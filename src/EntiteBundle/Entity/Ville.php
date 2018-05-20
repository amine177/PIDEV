<?php

namespace EntiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville", indexes={@ORM\Index(name="fk_deleg_gov", columns={"id_gouvernorat"})})
 * @ORM\Entity(repositoryClass="EntiteBundle\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var \Gouvernorat
     *
     * @ORM\ManyToOne(targetEntity="EntiteBundle\Entity\Gouvernorat",inversedBy="villes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_gouvernorat", referencedColumnName="id")
     * })
     */
    private $idGouvernorat;

    /**
     * Ville constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \Gouvernorat
     */
    public function getIdGouvernorat()
    {
        return $this->idGouvernorat;
    }

    /**
     * @param \Gouvernorat $idGouvernorat
     */
    public function setIdGouvernorat($idGouvernorat)
    {
        $this->idGouvernorat = $idGouvernorat;
    }

    public function __toString()
    {
        return $this->name." ".$this->idGouvernorat;
    }


}
