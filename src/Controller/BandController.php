<?php

    namespace App\Controller;

    use App\Repository\BandRepository;
    use App\Repository\ConcertRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class BandController extends AbstractController
    {

        #[Route('/bands', name: "bandList")]
        public function list(BandRepository $bandRepository): Response
        {
            return $this->render('band/list.html.twig', [
                'bands' => $bandRepository->findBy(array(), array('name' => 'ASC'))
            ]);
        }

         #[Route("/band/{id}", name: "bandShow")]
        public function show(BandRepository $bands, ConcertRepository $concerts, int $id): Response
        {
            return $this->render('band/show.html.twig', [
                'band' => $bands->find($id),
                'nextConcerts' => $concerts->findNextByBand($id),
            ]);
        }
    }
