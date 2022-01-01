<?php

namespace App\DataFixtures;

use App\Entity\Participate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipateFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $leJtParticipateFirstJanuary = new Participate();
        $leJtParticipateFirstJanuary ->setBand($this->getReference("leJT"))
                         ->setConcert($this->getReference("berliozFirstJanuary"))
                         ->setRunningPassage(1);

        $spideysParticipateFirstJanuary = new Participate();
        $spideysParticipateFirstJanuary ->setBand($this->getReference("Spideys"))
                            ->setConcert($this->getReference("pasteurFirstJanuary"))
                            ->setRunningPassage(1);

        $leJtParticipateSecondJanuary = new Participate();
        $leJtParticipateSecondJanuary ->setBand($this->getReference("leJT"))
                                      ->setConcert($this->getReference("apollonSecondJanuary"))
                                      ->setRunningPassage(1);

        $spideysParticipateSecondJanuary = new Participate();
        $spideysParticipateSecondJanuary ->setBand($this->getReference("Spideys"))
                                         ->setConcert($this->getReference("apollonSecondJanuary"))
                                         ->setRunningPassage(2);

        $manager->persist($leJtParticipateFirstJanuary);
        $manager->persist($spideysParticipateFirstJanuary);
        $manager->persist($leJtParticipateSecondJanuary);
        $manager->persist($spideysParticipateSecondJanuary);
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
