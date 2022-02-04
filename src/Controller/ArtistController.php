<?php

    namespace App\Controller;

    use App\Entity\Artist;
    use App\Entity\Image;
    use App\Form\ArtistFormType;
    use App\Form\BandFormType;
    use App\Repository\ArtistRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/artist')]
    class ArtistController extends AbstractController
    {
        #[Route('/new', name: 'artistNew')]
        public function new(Request $request, EntityManagerInterface $entityManager): Response
        {
            $artist = new Artist();
            $form = $this->createForm(ArtistFormType::class, $artist);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $data = $form->getData();
                if($file = $form->get('picture')->getData()) {
                    $image = new Image();
                    $image->setFile($file);
                    $data->setPicture($image);
                }

                $entityManager->persist($data);
                $entityManager->flush();
                return $this->redirectToRoute('adminArtists');

            }
            return $this->render('artist/edit.html.twig', [
                'artistForm' => $form->createView(),
            ]);
        }

        #[Route('/{id}/edit', name: 'artistEdit')]
        public function edit(ArtistRepository $artists, Request $request, EntityManagerInterface $entityManager, int $id): Response
        {
            $artist = $artists->find($id);
            $form = $this->createForm(ArtistFormType::class, $artist);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $edit = $form->getData();
                $file = $form->get('picture')->getData();
                $image = new Image();
                $image->setFile($file);
                $edit->setPicture($image);

                $entityManager->persist($edit);
                $entityManager->flush();
                return $this->redirectToRoute('adminArtists');

            }
            return $this->render('artist/edit.html.twig', [
                'artistForm' => $form->createView(),
            ]);
        }

        #[Route('/{id}/delete', name: 'artistDelete')]
        public function delete(ArtistRepository $artists, EntityManagerInterface $entityManager, int $id): Response
        {
            $entityManager->remove($artists->find($id));
            $entityManager->flush();
            return $this->redirectToRoute('adminArtists');
        }
    }
