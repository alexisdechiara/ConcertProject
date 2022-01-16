<?php

namespace App\Controller;

use App\Entity\Band;
use App\Repository\ConcertRepository;
use App\Repository\ParticipateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{

     #[Route('/concerts', name:"concertList")]
    public function list(ConcertRepository $concerts): Response
    {
        return $this->render('concert/list.html.twig', [
            'concerts' => $concerts->findBy(array(), array('date' => 'ASC'))
        ]);
    }

    #[Route('/concert/{id}', name:"concertShow")]
    public function show(ConcertRepository $concerts, ParticipateRepository $participates, int $id): Response
    {
        $mainBand = null;
        $participates = $concerts->find($id)->getParticipates();

        foreach ($participates as $participate) {
            if($participate->getIsMainBand())
                $mainBand = $participate->getBand();
        }

        return $this->render('concert/show.html.twig', [
            'concert' => $concerts->find($id),
            'mainBand' => $mainBand,
        ]);
    }
}
