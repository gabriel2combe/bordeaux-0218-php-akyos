<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Condominium;
use AppBundle\Entity\Syndicate;

/**
 * InterventionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InterventionRepository extends \Doctrine\ORM\EntityRepository
{
    public function findBySyndicate(Syndicate $syndicate)
    {
        return $this->createQueryBuilder('i')
            ->join('i.condominium', 'condo')
            ->join('condo.syndicate', 's')
            ->where('s.id = :syndicateId')
            ->setParameter(':syndicateId', $syndicate->getId())
            ->getQuery()
            ->getResult()
            ;
    }
}
