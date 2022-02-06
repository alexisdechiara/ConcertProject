<?php

    namespace App\Controller;

    use App\Entity\Band;
    use App\Entity\Image;
    use App\Form\BandFormType;
    use App\Repository\ArtistRepository;
    use App\Repository\BandRepository;
    use App\Repository\ConcertRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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


        #[IsGranted("ROLE_ADMIN")]
        #[Route("/new", name: "bandNew")]
        public function new(Request $request, EntityManagerInterface $entityManager): Response
        {
            $band = new Band();
            $form = $this->createForm(BandFormType::class, $band);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();
                if($coverFile = $form->get('coverFile')->getData()) {
                    $coverImage = new Image();
                    $coverImage->setFile($coverFile);
                    $data->setCoverImage($coverImage);
                }
                if($bannerFile = $form->get('bannerFile')->getData()) {
                    $bannerImage = new Image();
                    $bannerImage->setFile($bannerFile);
                    $data->setBannerImage($bannerImage);
                }

                $entityManager->persist($data);
                $entityManager->flush();

                return $this->redirectToRoute('adminBands');
            }
            return $this->render('band/edit.html.twig', [
                'bandForm' => $form->createView(),
            ]);
        }

        #[IsGranted("ROLE_ADMIN")]
        #[Route("/{id}/edit", name: "bandEdit")]
        public function edit(BandRepository $bands, Request $request, EntityManagerInterface $entityManager, int $id): Response
        {
            $band = $bands->find($id);
            $form = $this->createForm(BandFormType::class, $band);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();
                if($coverFile = $form->get('coverFile')->getData()) {
                    $coverImage = new Image();
                    $coverImage->setFile($coverFile);
                    $data->setCoverImage($coverImage);
                }
                if($bannerFile = $form->get('bannerFile')->getData()) {
                    $bannerImage = new Image();
                    $bannerImage->setFile($bannerFile);
                    $data->setBannerImage($bannerImage);
                }

                $entityManager->persist($data);
                $entityManager->flush();

                return $this->redirectToRoute('adminBands');
            }
            return $this->render('band/edit.html.twig', [
                'bandForm' => $form->createView(),
            ]);
        }

        #[IsGranted("ROLE_ADMIN")]
        #[Route("/{id}/delete", name: "bandDelete")]
        public function delete(BandRepository $bands, EntityManagerInterface $entityManager, int $id): Response
        {
            $entityManager->remove($bands->find($id));
            $entityManager->flush();
            return $this->redirectToRoute('adminBands');
        }

        #[Route("/{id}", name: "bandShow")]
        public function show(BandRepository $bands, ConcertRepository $concerts, int $id): Response
        {
            return $this->render('band/show.html.twig', [
                'band' => $bands->find($id),
                'nextConcerts' => $concerts->findNextByBand($id),
            ]);
        }
    }
