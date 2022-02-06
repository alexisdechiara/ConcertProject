<?php

namespace App\Repository;

use App\Entity\Concert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
     * @return mixed All year of concert that have already taken place
     */
    public function findPreviousYear(): mixed {
        return $this->createQueryBuilder('c')
                    ->select('YEAR(c.date)')
                    ->where('c.date < :date ')
                    ->setParameter('date', new \DateTime())
                    ->orderBy('YEAR(c.date)', 'DESC')
                    ->distinct()
                    ->getQuery()
                    ->getResult()
            ;
    }

    /**
     * @return mixed All year of concert that have already taken place
     */
    public function findPreviousByYear($year): mixed {
        return $this->createQueryBuilder('c')
            ->where('c.date < :date ')
            ->andWhere('YEAR(c.date) = :year')
            ->setParameter('date', new \DateTime())
            ->setParameter('year', $year)
            ->orderBy('c.date', 'DESC')
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
            ->where('c.date >= :date')
            ->andWhere('DAY(c.date) = :day')
            ->setParameter('date', $today)
            ->setParameter('day', $today->format('d'))
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
            ->where('c.date >= :date')
            ->andWhere('WEEK(c.date) = :week')
            ->andWhere('DAY(c.date) != :day')
            ->setParameter('date', $today)
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
            ->where('c.date >= :date')
            ->andWhere('MONTH(c.date) = :month')
            ->andWhere('WEEK(c.date) != :week')
            ->setParameter('date', $today)
            ->setParameter('month', $today->format('m'))
            ->setParameter('week', $today->format('W'))
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return mixed All the concerts that are going to take place this week, today excluded
     */
    public function findLater(): mixed {
        $today = new \DateTime();
        return $this->createQueryBuilder('c')
            ->where('c.date > :date')
            ->andWhere('MONTH(c.date) != :month')
            ->setParameter('date', $today)
            ->setParameter('month', $today->format('m'))
            ->orderBy('c.date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
}
