<?php

namespace EntiteBundle\Repository;

/**
 * VilleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VilleRepository extends \Doctrine\ORM\EntityRepository
{


    public function findByGouvernorat($gouvid){
        $q=$this->getEntityManager()
            ->createQuery("select v from EntiteBundle:Ville v WHERE v.idGouvernorat =:gouv ")
            ->setParameter(":gouv",$gouvid);
        return $q->getResult();
    }
}