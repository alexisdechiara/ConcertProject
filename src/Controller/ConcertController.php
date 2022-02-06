<?php

namespace App\Controller;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\Image;
use App\Form\BandFormType;
use App\Form\ConcertFormType;
use App\Repository\BandRepository;
use App\Repository\ConcertRepository;
use App\Repository\ParticipateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('concert')]
class ConcertController extends AbstractController
{

    #[Route('/', name:"concertList")]
    public function list(ConcertRepository $concerts): Response
    {
        return $this->render('concert/list.html.twig', [
            'todayConcerts' => $concerts->findToday(),
            'thisWeekConcerts' => $concerts->findThisWeek(),
            'thisMonthConcerts' => $concerts->findThisMonth(),
            'otherConcerts' => $concerts->findLater(),
        ]);
    }

    #[Route('/archive', name:"concertArchive")]
    public function archive(ConcertRepository $concerts): Response
    {
        $archivedConcerts = null;
        foreach ($concerts->findPreviousYear() as $year) {
            $value = $year[1];
            $archivedConcerts[(string) $value] = $concerts->findPreviousByYear((string) $value);
        }
        return $this->render('concert/archive.html.twig', [
            'archivedConcerts' => $archivedConcerts,
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route("/new", name: "concertNew")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $concert = new Concert();
        $form = $this->createForm(ConcertFormType::class, $concert);

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
            return $this->redirectToRoute("adminConcerts");
        }
        return $this->render('concert/edit.html.twig', [
            'concertForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name:"concertShow")]
    public function show(ConcertRepository $concerts, bandRepository $bands, int $id): Response {
        return $this->render('concert/show.html.twig', [
            'concert' => $concerts->find($id),
            'mainBand' => $bands->findMainOfConcert($id)
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route("/{id}/edit", name: "concertEdit")]
    public function edit(ConcertRepository $concerts, Request $request, EntityManagerInterface $entityManager, int $id): Response
    {
        $concert = $concerts->find($id);
        $form = $this->createForm(ConcertFormType::class, $concert);
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
            return $this->redirectToRoute("adminConcerts");
        }
        return $this->render('concert/edit.html.twig', [
            'concertForm' => $form->createView(),
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route("/{id}/delete", name: "concertDelete")]
    public function delete(ConcertRepository $concerts, EntityManagerInterface $entityManager, int $id): Response
    {
        $entityManager->remove($concerts->find($id));
        $entityManager->flush();
        return $this->redirectToRoute('adminConcerts');
    }
}
