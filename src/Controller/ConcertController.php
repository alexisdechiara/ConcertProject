<?php

namespace App\Controller;

use App\Entity\Band;
use App\Repository\BandRepository;
use App\Repository\ConcertRepository;
use App\Repository\ParticipateRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{

     #[Route('/concerts', name:"concertList")]
    public function list(ConcertRepository $concerts): Response
    {
        return $this->render('concert/list.html.twig', [
            'todayConcerts' => $concerts->findToday(),
            'thisWeekConcerts' => $concerts->findThisWeek(),
            'thisMonthConcerts' => $concerts->findThisMonth(),
            'otherConcerts' => $concerts->findBy(array(), array('date' => 'ASC')),
        ]);
    }

    #[Route('/concert/{id}', name:"concertShow")]
    public function show(ConcertRepository $concerts, bandRepository $bands, int $id): Response {
        return $this->render('concert/show.html.twig', [
            'concert' => $concerts->find($id),
            'mainBand' => $bands->findMainOfConcert($id)
        ]);
    }
}
