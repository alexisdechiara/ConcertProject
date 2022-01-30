<?php

    namespace App\Controller;

    use App\Entity\Band;
    use App\Form\BandFormType;
    use App\Repository\ArtistRepository;
    use App\Repository\BandRepository;
    use App\Repository\ConcertRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/band')]
    class BandController extends AbstractController
    {

        #[Route('/', name: "bandList")]
        public function list(BandRepository $bandRepository): Response
        {
            return $this->render('band/list.html.twig', [
                'bands' => $bandRepository->findBy(array(), array('name' => 'ASC'))
            ]);
        }


        #[Route("/new", name: "bandNew")]
        public function new(Request $request, EntityManagerInterface $entityManager): Response
        {
            $band = new Band();
            $form = $this->createForm(BandFormType::class, $band);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $show = $form->getData();

                $entityManager->persist($show);
                $entityManager->flush();
            }
            return $this->render('band/edit.html.twig', [
                'bandForm' => $form->createView(),
            ]);
        }

        #[Route("/{id}", name: "bandShow")]
        public function show(BandRepository $bands, ConcertRepository $concerts, int $id): Response
        {
            return $this->render('band/show.html.twig', [
                'band' => $bands->find($id),
                'nextConcerts' => $concerts->findNextByBand($id),
            ]);
        }

        #[Route("/{id}/edit", name: "bandEdit")]
        public function edit(BandRepository $bands, Request $request, EntityManagerInterface $entityManager, int $id): Response
        {
            $band = $bands->find($id);
            $form = $this->createForm(BandFormType::class, $band);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $show = $form->getData();

                $entityManager->persist($show);
                $entityManager->flush();
            }
            return $this->render('band/edit.html.twig', [
                'bandForm' => $form->createView(),
            ]);
        }

        #[Route("/{id}/delete", name: "bandDelete")]
        public function delete(BandRepository $bands, EntityManagerInterface $entityManager, int $id): Response
        {
            $entityManager->remove($bands->find($id));
            $entityManager->flush();
            return $this->redirectToRoute('adminBands');
        }
    }
