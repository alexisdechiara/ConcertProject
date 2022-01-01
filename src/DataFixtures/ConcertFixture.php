<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use DateInterval;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConcertFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $berliozFirstJanuary = new Concert();
        $berliozFirstJanuary ->setName('Le jt fait son show')
                             ->setHall($this->getReference('Berlioz'))
                             ->setDate(new DateTime('01/01/2022 20:00:00'))
                             ->setDuration(new DateInterval('PT2H'));

        $pasteurFirstJanuary = new Concert();
        $pasteurFirstJanuary ->setName('The Spidey Band Tour')
                             ->setHall($this->getReference('Pasteur'))
                             ->setDate(new DateTime('01/01/2022 20:00:00'))
                             ->setDuration(new DateInterval('PT2H'));

        $apollonSecondJanuary = new Concert();
        $apollonSecondJanuary ->setName('Spideys & le JT de 20h')
                              ->setHall($this->getReference('Apollon'))
                              ->setDate(new DateTime('02/01/2022 20:00:00'))
                              ->setDuration(new DateInterval('PT4H'));

        $manager->persist($berliozFirstJanuary);
        $manager->persist($pasteurFirstJanuary);
        $manager->persist($apollonSecondJanuary);
        $manager->flush();

        $this->addReference("berliozFirstJanuary", $berliozFirstJanuary);
        $this->addReference("pasteurFirstJanuary", $pasteurFirstJanuary);
        $this->addReference("apollonSecondJanuary", $apollonSecondJanuary);
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
            HallFixture::class,
        ];
    }
}
