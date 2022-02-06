<?php

namespace App\DataFixtures;

use App\Entity\Participate;
use DateInterval;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipateFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $pommeFaille                    = new Participate();
        $pommeFaille                    ->setBand($this->getReference("pommeBand"))
                                        ->setConcert($this->getReference("failleTour"))
                                        ->setDuration(new DateInterval('PT3H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $calogeroCalogeroConcert        = new Participate();
        $calogeroCalogeroConcert        ->setBand($this->getReference("calogeroBand"))
                                        ->setConcert($this->getReference("calogeroConcert"))
                                        ->setDuration(new DateInterval('PT2H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(2);

        $maelleCalogeroConcert          = new Participate();
        $maelleCalogeroConcert          ->setBand($this->getReference("maelleBand"))
                                        ->setConcert($this->getReference("calogeroConcert"))
                                        ->setDuration(new DateInterval('PT1H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $suzaneToiToi                   = new Participate();
        $suzaneToiToi                   ->setBand($this->getReference("suzaneBand"))
                                        ->setConcert($this->getReference("toiToi"))
                                        ->setDuration(new DateInterval('PT4H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $stromaeMultitude               = new Participate();
        $stromaeMultitude               ->setBand($this->getReference("stromaeBand"))
                                        ->setConcert($this->getReference("multitudeTour"))
                                        ->setDuration(new DateInterval('PT3H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $angeleNonanteCinq              = new Participate();
        $angeleNonanteCinq              ->setBand($this->getReference("angeleBand"))
                                        ->setConcert($this->getReference("nonanteCinq"))
                                        ->setDuration(new DateInterval('PT3H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $bigfloEtOli                    = new Participate();
        $bigfloEtOli                    ->setBand($this->getReference("bigfloOliBand"))
                                        ->setConcert($this->getReference("bigfloEtOliConcert"))
                                        ->setDuration(new DateInterval('PT3H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $barbaraBarbaraTournee          = new Participate();
        $barbaraBarbaraTournee          ->setBand($this->getReference("barbaraBand"))
                                        ->setConcert($this->getReference("barbaraTournee"))
                                        ->setDuration(new DateInterval('PT3H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $pommeHoshiTour                 = new Participate();
        $pommeHoshiTour                 ->setBand($this->getReference("pommeBand"))
                                        ->setConcert($this->getReference("hoshiTour"))
                                        ->setDuration(new DateInterval('PT1H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $hoshiHoshiTour                 = new Participate();
        $hoshiHoshiTour                 ->setBand($this->getReference("hoshiBand"))
                                        ->setConcert($this->getReference("hoshiTour"))
                                        ->setDuration(new DateInterval('PT2H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(2);

        $angeleHoshiTour                = new Participate();
        $angeleHoshiTour                ->setBand($this->getReference("angeleBand"))
                                        ->setConcert($this->getReference("hoshiTour"))
                                        ->setDuration(new DateInterval('PT1H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(3);

        $bigFloEtOliOrelsanTour         = new Participate();
        $bigFloEtOliOrelsanTour         ->setBand($this->getReference("bigfloOliBand"))
                                        ->setConcert($this->getReference("orelsanTour"))
                                        ->setDuration(new DateInterval('PT1H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $orelsanOrelsanTour             = new Participate();
        $orelsanOrelsanTour             ->setBand($this->getReference("orelsanBand"))
                                        ->setConcert($this->getReference("orelsanTour"))
                                        ->setDuration(new DateInterval('PT2H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(2);

        $benMazueparadisTour            = new Participate();
        $benMazueparadisTour            ->setBand($this->getReference("benMazueBand"))
                                        ->setConcert($this->getReference("paradisTour"))
                                        ->setDuration(new DateInterval('PT2H'))
                                        ->setIsMainBand(true)
                                        ->setRunningPassage(1);

        $pommeParadisTour               = new Participate();
        $pommeParadisTour               ->setBand($this->getReference("pommeBand"))
                                        ->setConcert($this->getReference("paradisTour"))
                                        ->setDuration(new DateInterval('PT2H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $pommeLesEnfoires               = new Participate();
        $pommeLesEnfoires               ->setBand($this->getReference("pommeBand"))
                                        ->setConcert($this->getReference("lesEnfoires"))
                                        ->setDuration(new DateInterval('PT6H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $calogeroLesEnfoires            = new Participate();
        $calogeroLesEnfoires            ->setBand($this->getReference("calogeroBand"))
                                        ->setConcert($this->getReference("lesEnfoires"))
                                        ->setDuration(new DateInterval('PT6H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $suzaneLesEnfoires              = new Participate();
        $suzaneLesEnfoires              ->setBand($this->getReference("suzaneBand"))
                                        ->setConcert($this->getReference("lesEnfoires"))
                                        ->setDuration(new DateInterval('PT6H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $stromaeLesEnfoires             = new Participate();
        $stromaeLesEnfoires             ->setBand($this->getReference("stromaeBand"))
                                        ->setConcert($this->getReference("lesEnfoires"))
                                        ->setDuration(new DateInterval('PT6H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $orelsanLesEnfoires             = new Participate();
        $orelsanLesEnfoires             ->setBand($this->getReference("orelsanBand"))
                                        ->setConcert($this->getReference("lesEnfoires"))
                                        ->setDuration(new DateInterval('PT6H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);

        $benMazueLesEnfoires            = new Participate();
        $benMazueLesEnfoires            ->setBand($this->getReference("benMazueBand"))
                                        ->setConcert($this->getReference("lesEnfoires"))
                                        ->setDuration(new DateInterval('PT6H'))
                                        ->setIsMainBand(false)
                                        ->setRunningPassage(1);


        $manager->persist($pommeFaille);
        $manager->persist($calogeroCalogeroConcert);
        $manager->persist($maelleCalogeroConcert);
        $manager->persist($suzaneToiToi);
        $manager->persist($stromaeMultitude);
        $manager->persist($angeleNonanteCinq);
        $manager->persist($bigfloEtOli);
        $manager->persist($barbaraBarbaraTournee);
        $manager->persist($pommeHoshiTour);
        $manager->persist($hoshiHoshiTour);
        $manager->persist($angeleHoshiTour);
        $manager->persist($orelsanOrelsanTour);
        $manager->persist($bigFloEtOliOrelsanTour);
        $manager->persist($benMazueparadisTour);
        $manager->persist($pommeParadisTour);
        $manager->persist($pommeLesEnfoires);
        $manager->persist($calogeroLesEnfoires);
        $manager->persist($suzaneLesEnfoires);
        $manager->persist($stromaeLesEnfoires);
        $manager->persist($orelsanLesEnfoires);
        $manager->persist($benMazueLesEnfoires);
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @psalm-return array<class-string<FixtureInterface>>
     */
    public function getDependencies(): array
    {
        return [
            BandFixture::class,
            ConcertFixture::class,
        ];
    }
}
