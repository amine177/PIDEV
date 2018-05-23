<?php

namespace EntiteBundle\Repository;


use Doctrine\ORM\EntityRepository ;

class EvenementsRepository extends EntityRepository
{

        public function findbest(){
            $q=$this->getEntityManager()
                ->createQuery("SELECT m from EntiteBundle:Evenements m 
                             ORDER BY nb_place DESC ")
                ->setMaxResults(3);
            return $q->getResult();
        }




}
