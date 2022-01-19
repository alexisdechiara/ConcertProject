<?php

namespace App\Controller;

use App\Repository\ConcertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(ConcertRepository $concerts): Response
    {
        $nextConcerts = $concerts->findNext();
        if(count($nextConcerts) > 3)
            $nextConcerts = array_slice($concerts->findNext(),0,3);
        return $this->render('home/index.html.twig', [
            'concerts' => $nextConcerts,
        ]);
    }
}
