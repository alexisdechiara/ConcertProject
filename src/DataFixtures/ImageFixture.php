<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pommePicture           = new Image();
        $pommePicture           ->setFile(new UploadedFile("src/DataFixtures/img/artist/pomme-picture.jpg", 'pomme', "image/jpg",null,true));
        $pommeCover             = new Image();
        $pommeCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/pomme-cover.jpg", 'pomme', "image/jpg",null,true));
        $pommeBanner            = new Image();
        $pommeBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/pomme-banner.jpg", 'pomme', "image/jpg",null,true));


        $calogeroPicture        = new Image();
        $calogeroPicture        ->setFile(new UploadedFile("src/DataFixtures/img/artist/calogero-picture.jpg", 'calogero', "image/jpg",null,true));
        $calogeroCover             = new Image();
        $calogeroCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/calogero-cover.jpg", 'calogero', "image/jpg",null,true));
        $calogeroBanner            = new Image();
        $calogeroBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/calogero-banner.jpg", 'calogero', "image/jpg",null,true));

        $orelsanPicture         = new Image();
        $orelsanPicture         ->setFile(new UploadedFile("src/DataFixtures/img/artist/orelsan-picture.jpg", 'orelsan', "image/jpg",null,true));
        $orelsanCover             = new Image();
        $orelsanCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/orelsan-cover.jpg", 'orelsan', "image/jpg",null,true));
        $orelsanBanner            = new Image();
        $orelsanBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/orelsan-banner.jpg", 'orelsan', "image/jpg",null,true));

        $angelePicture          = new Image();
        $angelePicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/angele-picture.jpg", 'angele', "image/jpg",null,true));
        $angeleCover             = new Image();
        $angeleCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/angele-cover.png", 'angele', "image/png",null,true));
        $angeleBanner            = new Image();
        $angeleBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/angele-banner.jpg", 'angele', "image/jpg",null,true));

        $bigfloPicture          = new Image();
        $bigfloPicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/bigflo-picture.jpg", 'bigflo', "image/jpg",null,true));

        $oliPicture             = new Image();
        $oliPicture             ->setFile(new UploadedFile("src/DataFixtures/img/artist/oli-picture.jpg", 'oli', "image/jpg",null,true));

        $bigfloEtOliCover       = new Image();
        $bigfloEtOliCover       ->setFile(new UploadedFile("src/DataFixtures/img/band/bigfloEtOli-cover.png", 'bigfloEtOli', "image/png",null,true));
        $bigfloEtOliBanner      = new Image();
        $bigfloEtOliBanner      ->setFile(new UploadedFile("src/DataFixtures/img/band/bigfloEtOli-banner.jpg", 'bigfloEtOli', "image/jpg",null,true));

        $barbaraPicture          = new Image();
        $barbaraPicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/barbara-picture.jpg", 'barbara', "image/jpg",null,true));
        $barbaraCover             = new Image();
        $barbaraCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/barbara-cover.jpg", 'barbara', "image/jpg",null,true));
        $barbaraBanner            = new Image();
        $barbaraBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/barbara-banner.jpg", 'barbara', "image/jpg",null,true));

        $hoshiPicture          = new Image();
        $hoshiPicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/hoshi-picture.jpg", 'hoshi', "image/jpg",null,true));
        $hoshiCover             = new Image();
        $hoshiCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/hoshi-cover.jpg", 'hoshi', "image/jpg",null,true));
        $hoshiBanner            = new Image();
        $hoshiBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/hoshi-banner.jpg", 'hoshi', "image/jpg",null,true));

        $benMazuePicture          = new Image();
        $benMazuePicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/benMazue-picture.jpg", 'benMazue', "image/jpg",null,true));
        $benMazueCover             = new Image();
        $benMazueCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/benMazue-cover.jpg", 'benMazue', "image/jpg",null,true));
        $benMazueBanner            = new Image();
        $benMazueBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/benMazue-banner.jpg", 'benMazue', "image/jpg",null,true));

        $maellePicture          = new Image();
        $maellePicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/maelle-picture.jpg", 'maelle', "image/jpg",null,true));
        $maelleCover             = new Image();
        $maelleCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/maelle-cover.webp", 'maelle', "image/webp",null,true));
        $maelleBanner            = new Image();
        $maelleBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/maelle-banner.jpg", 'maelle', "image/jpg",null,true));

        $suzanePicture          = new Image();
        $suzanePicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/suzane-picture.jpg", 'suzane', "image/jpg",null,true));
        $suzaneCover             = new Image();
        $suzaneCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/suzane-cover.png", 'suzane', "image/png",null,true));
        $suzaneBanner            = new Image();
        $suzaneBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/suzane-banner.jpg", 'suzane', "image/jpg",null,true));

        $gcmPicture          = new Image();
        $gcmPicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/gcm-picture.jpg", 'gcm', "image/jpg",null,true));
        $gcmCover             = new Image();
        $gcmCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/gcm-cover.jpg", 'gcm', "image/jpg",null,true));
        $gcmBanner            = new Image();
        $gcmBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/gcm-banner.png", 'gcm', "image/png",null,true));

        $louanePicture          = new Image();
        $louanePicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/louane-picture.jpg", 'louane', "image/jpg",null,true));
        $louaneCover             = new Image();
        $louaneCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/louane-cover.jpg", 'louane', "image/jpg",null,true));
        $louaneBanner            = new Image();
        $louaneBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/louane-banner.jpg", 'louane', "image/jpg",null,true));

        $stromaePicture          = new Image();
        $stromaePicture          ->setFile(new UploadedFile("src/DataFixtures/img/artist/stromae-picture.jpg", 'stromae', "image/jpg",null,true));
        $stromaeCover             = new Image();
        $stromaeCover             ->setFile(new UploadedFile("src/DataFixtures/img/band/stromae-cover.jpg", 'stromae', "image/jpg",null,true));
        $stromaeBanner            = new Image();
        $stromaeBanner            ->setFile(new UploadedFile("src/DataFixtures/img/band/stromae-banner.jpg", 'stromae', "image/jpg",null,true));

        $failleTourCover          = new Image();
        $failleTourCover          ->setFile(new UploadedFile("src/DataFixtures/img/concert/failleTour-cover.jpg", 'pomme', "image/jpg",null,true));
        $failleTourBanner         = new Image();
        $failleTourBanner         ->setFile(new UploadedFile("src/DataFixtures/img/concert/failleTour-banner.jpg", 'pomme', "image/jpg",null,true));

        $calogeroConcertCover          = new Image();
        $calogeroConcertCover          ->setFile(new UploadedFile("src/DataFixtures/img/concert/calogeroConcert-cover.jpg", 'calogeroConcert', "image/jpg",null,true));
        $calogeroConcertBanner         = new Image();
        $calogeroConcertBanner         ->setFile(new UploadedFile("src/DataFixtures/img/concert/calogeroConcert-banner.jpg", 'calogeroConcert', "image/jpg",null,true));

        $multitudeTourCover         = new Image();
        $multitudeTourCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/multitudeTour-cover.jpg", 'multitudeTour', "image/jpg",null,true));
        $multitudeTourBanner        = new Image();
        $multitudeTourBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/multitudeTour-banner.jpg", 'multitudeTour', "image/jpg",null,true));

        $toiToiCover         = new Image();
        $toiToiCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/toiToi-cover.jpg", 'toitoi', "image/jpg",null,true));
        $toiToiBanner        = new Image();
        $toiToiBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/toiToi-banner.png", 'toitoi', "image/png",null,true));

        $nonanteCinqTourCover         = new Image();
        $nonanteCinqTourCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/nonanteCinqTour-cover.jpg", 'nonanteCinq', "image/jpg",null,true));
        $nonanteCinqTourBanner          = new Image();
        $nonanteCinqTourBanner          ->setFile(new UploadedFile("src/DataFixtures/img/concert/nonanteCinqTour-banner.jpg", 'nonanteCinq', "image/jpg",null,true));

        $bigfloEtOliTourCover        = new Image();
        $bigfloEtOliTourCover        ->setFile(new UploadedFile("src/DataFixtures/img/concert/bigFloEtOliTour-cover.jpg", 'bigfloEtOliTour', "image/jpg",null,true));
        $bigfloEtOliTourBanner          = new Image();
        $bigfloEtOliTourBanner          ->setFile(new UploadedFile("src/DataFixtures/img/concert/bigFloEtOliTour-banner.jpg", 'bigFloEtOliTour', "image/jpg",null,true));

        $barbaraTourCover         = new Image();
        $barbaraTourCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/barbaraTour-cover.jpg", 'barbaraTour', "image/jpg",null,true));
        $barbaraTourBanner        = new Image();
        $barbaraTourBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/barbaraTour-banner.jpg", 'barbaraTour', "image/jpg",null,true));

        $hoshiTourCover         = new Image();
        $hoshiTourCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/hoshiTour-cover.jpg", 'hoshiTour', "image/jpg",null,true));
        $hoshiTourBanner        = new Image();
        $hoshiTourBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/hoshiTour-banner.jpg", 'hoshiTour', "image/jpg",null,true));

        $orelsanTourCover         = new Image();
        $orelsanTourCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/orelsanTour-cover.jpg", 'orelsanTour', "image/jpg",null,true));
        $orelsanTourBanner        = new Image();
        $orelsanTourBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/orelsanTour-banner.jpg", 'orelsanTour', "image/jpg",null,true));

        $paradisTourCover         = new Image();
        $paradisTourCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/paradisTour-cover.jpg", 'paradisTour', "image/jpg",null,true));
        $paradisTourBanner        = new Image();
        $paradisTourBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/paradisTour-banner.jpg", 'paradisTour', "image/jpg",null,true));

        $lesEnfoiresCover         = new Image();
        $lesEnfoiresCover         ->setFile(new UploadedFile("src/DataFixtures/img/concert/lesEnfoires-cover.jpg", 'lesEnfoires', "image/jpg",null,true));
        $lesEnfoiresBanner        = new Image();
        $lesEnfoiresBanner        ->setFile(new UploadedFile("src/DataFixtures/img/concert/lesEnfoires-banner.jpg", 'lesEnfoires', "image/jpg",null,true));

        $manager->persist($pommePicture);
        $manager->persist($calogeroPicture);
        $manager->persist($orelsanPicture);
        $manager->persist($angelePicture);
        $manager->persist($bigfloPicture);
        $manager->persist($oliPicture);
        $manager->persist($barbaraPicture);
        $manager->persist($hoshiPicture);
        $manager->persist($benMazuePicture);
        $manager->persist($maellePicture);
        $manager->persist($suzanePicture);
        $manager->persist($gcmPicture);
        $manager->persist($louanePicture);
        $manager->persist($stromaePicture);

        $manager->persist($pommeCover);
        $manager->persist($calogeroCover);
        $manager->persist($orelsanCover);
        $manager->persist($angeleCover);
        $manager->persist($bigfloEtOliCover);
        $manager->persist($barbaraCover);
        $manager->persist($hoshiCover);
        $manager->persist($benMazueCover);
        $manager->persist($maelleCover);
        $manager->persist($suzaneCover);
        $manager->persist($gcmCover);
        $manager->persist($louaneCover);
        $manager->persist($stromaeCover);

        $manager->persist($pommeBanner);
        $manager->persist($calogeroBanner);
        $manager->persist($orelsanBanner);
        $manager->persist($angeleBanner);
        $manager->persist($bigfloEtOliBanner);
        $manager->persist($barbaraBanner);
        $manager->persist($hoshiBanner);
        $manager->persist($benMazueBanner);
        $manager->persist($maelleBanner);
        $manager->persist($suzaneBanner);
        $manager->persist($gcmBanner);
        $manager->persist($louaneBanner);
        $manager->persist($stromaeBanner);

        $manager->persist($failleTourCover);
        $manager->persist($calogeroConcertCover);
        $manager->persist($multitudeTourCover);
        $manager->persist($toiToiCover);
        $manager->persist($nonanteCinqTourCover);
        $manager->persist($bigfloEtOliTourCover);
        $manager->persist($barbaraTourCover);
        $manager->persist($hoshiTourCover);
        $manager->persist($orelsanTourCover);
        $manager->persist($paradisTourCover);
        $manager->persist($lesEnfoiresCover);

        $manager->persist($failleTourBanner);
        $manager->persist($calogeroConcertBanner);
        $manager->persist($multitudeTourBanner);
        $manager->persist($toiToiBanner);
        $manager->persist($nonanteCinqTourBanner);
        $manager->persist($bigfloEtOliTourBanner);
        $manager->persist($barbaraTourBanner);
        $manager->persist($hoshiTourBanner);
        $manager->persist($orelsanTourBanner);
        $manager->persist($paradisTourBanner);
        $manager->persist($lesEnfoiresBanner);


        $manager->flush();

        $this->addReference("pommePicture", $pommePicture);
        $this->addReference("calogeroPicture", $calogeroPicture);
        $this->addReference("orelsanPicture", $orelsanPicture);
        $this->addReference("angelePicture", $angelePicture);
        $this->addReference("bigfloPicture", $bigfloPicture);
        $this->addReference("oliPicture", $oliPicture);
        $this->addReference("barbaraPicture", $barbaraPicture);
        $this->addReference("hoshiPicture", $hoshiPicture);
        $this->addReference("benMazuePicture", $benMazuePicture);
        $this->addReference("maellePicture", $maellePicture);
        $this->addReference("suzanePicture", $suzanePicture);
        $this->addReference("gcmPicture", $gcmPicture);
        $this->addReference("louanePicture", $louanePicture);
        $this->addReference("stromaePicture", $stromaePicture);

        $this->addReference("pommeCover", $pommeCover);
        $this->addReference("calogeroCover", $calogeroCover);
        $this->addReference("orelsanCover", $orelsanCover);
        $this->addReference("angeleCover", $angeleCover);
        $this->addReference("bigfloEtOliCover", $bigfloEtOliCover);
        $this->addReference("barbaraCover", $barbaraCover);
        $this->addReference("hoshiCover", $hoshiCover);
        $this->addReference("benMazueCover", $benMazueCover);
        $this->addReference("maelleCover", $maelleCover);
        $this->addReference("suzaneCover", $suzaneCover);
        $this->addReference("gcmCover", $gcmCover);
        $this->addReference("louaneCover", $louaneCover);
        $this->addReference("stromaeCover", $stromaeCover);

        $this->addReference("pommeBanner", $pommeBanner);
        $this->addReference("calogeroBanner", $calogeroBanner);
        $this->addReference("orelsanBanner", $orelsanBanner);
        $this->addReference("angeleBanner", $angeleBanner);
        $this->addReference("bigfloEtOliBanner", $bigfloEtOliBanner);
        $this->addReference("barbaraBanner", $barbaraBanner);
        $this->addReference("hoshiBanner", $hoshiBanner);
        $this->addReference("benMazueBanner", $benMazueBanner);
        $this->addReference("maelleBanner", $maelleBanner);
        $this->addReference("suzaneBanner", $suzaneBanner);
        $this->addReference("gcmBanner", $gcmBanner);
        $this->addReference("louaneBanner", $louaneBanner);
        $this->addReference("stromaeBanner", $stromaeBanner);

        $this->addReference("failleTourCover", $failleTourCover);
        $this->addReference("calogeroConcertCover", $calogeroConcertCover);
        $this->addReference("multitudeTourCover", $multitudeTourCover);
        $this->addReference("toiToiCover", $toiToiCover);
        $this->addReference("nonanteCinqTourCover", $nonanteCinqTourCover);
        $this->addReference("bigfloEtOliTourCover", $bigfloEtOliTourCover);
        $this->addReference("barbaraTourCover", $barbaraTourCover);
        $this->addReference("hoshiTourCover", $hoshiTourCover);
        $this->addReference("orelsanTourCover", $orelsanTourCover);
        $this->addReference("paradisTourCover", $paradisTourCover);
        $this->addReference("lesEnfoiresCover", $lesEnfoiresCover);

        $this->addReference("failleTourBanner", $failleTourBanner);
        $this->addReference("calogeroConcertBanner", $calogeroConcertBanner);
        $this->addReference("multitudeTourBanner", $multitudeTourBanner);
        $this->addReference("toiToiBanner", $toiToiBanner);
        $this->addReference("nonanteCinqTourBanner", $nonanteCinqTourBanner);
        $this->addReference("bigfloEtOliTourBanner", $bigfloEtOliTourBanner);
        $this->addReference("barbaraTourBanner", $barbaraTourBanner);
        $this->addReference("hoshiTourBanner", $hoshiTourBanner);
        $this->addReference("orelsanTourBanner", $orelsanTourBanner);
        $this->addReference("paradisTourBanner", $paradisTourBanner);
        $this->addReference("lesEnfoiresBanner", $lesEnfoiresBanner);
    }
}
