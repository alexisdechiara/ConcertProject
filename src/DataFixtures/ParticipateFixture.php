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

        $manager->persist($pommeFaille);
        $manager->persist($calogeroCalogeroConcert);
        $manager->persist($maelleCalogeroConcert);
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
