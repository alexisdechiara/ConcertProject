<?php

namespace App\Repository;

use App\Entity\Concert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @method Concert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concert[]    findAll()
 * @method Concert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concert::class);
    }

    /**
     * @param $id
     * @return mixed All the concerts that are going to take place for the band
     */
    public function findNextByBand($id): mixed {
        return $this->createQueryBuilder('c')
            ->join('c.participates', 'p')
            ->join('p.band', 'b')
            ->where('b.id = :id')
            ->andWhere('c.date > :date')
            ->setParameter('id', $id)
            ->setParameter('date', new \DateTime())
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return mixed All the concerts that are going to take place
     */
    public function findNext(): mixed {
        return $this->createQueryBuilder('c')
                    ->where('c.date > :date')
                    ->setParameter('date', new \DateTime())
                    ->orderBy('c.date', 'ASC')
                    ->getQuery()
                    ->getResult()
            ;
    }

    /**
     * @return mixed All the concerts that are going to take place today
     */
    public function findToday(): mixed {
        $today = new \DateTime();
        return $this->createQueryBuilder('c')
            ->where('c.date = :date')
            ->setParameter('date', $today->format('d'))
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return mixed All the concerts that are going to take place this week, today excluded
     */
    public function findThisWeek(): mixed {
        $today = new \DateTime();
        return $this->createQueryBuilder('c')
            ->where('c.date = :week')
            ->andWhere('c.date != :day')
            ->setParameter('week', $today->format('W'))
            ->setParameter('day', $today->format('d'))
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return mixed All the concerts that are going to take place this week, today excluded
     */
    public function findThisMonth(): mixed {
        $today = new \DateTime();
        return $this->createQueryBuilder('c')
            ->where('c.date = :month')
            ->andWhere('c.date != :week')
            ->setParameter('month', $today->format('m'))
            ->setParameter('week', $today->format('W'))
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return mixed All concerts that have already taken place
     */
    public function findPrevious(): mixed {
        return $this->createQueryBuilder('c')
            ->where('c.date <= :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
}
