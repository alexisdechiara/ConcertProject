<?php

namespace App\DataFixtures;

use App\Entity\Hall;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HallFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $berlioz = new Hall();
        $berlioz ->setName("Berlioz")
            ->setCapacity(2000)
            ->setBuilding($this->getReference("Corum"));

        $pasteur = new Hall();
        $pasteur ->setName("Pasteur")
            ->setCapacity(745)
            ->setBuilding($this->getReference("Corum"));

        $einstein = new Hall();
        $einstein ->setName("Einstein")
            ->setCapacity(318)
            ->setBuilding($this->getReference("Corum"));

        $apollon = new Hall();
        $apollon ->setName("Apollon")
            ->setCapacity(2464)
            ->setBuilding($this->getReference("Acropolis"));

        $athena = new Hall();
        $athena ->setName("Athéna")
            ->setCapacity(750)
            ->setBuilding($this->getReference("Acropolis"));

        $hermes = new Hall();
        $hermes ->setName("Hermès")
            ->setCapacity(300)
            ->setBuilding($this->getReference("Acropolis"));

        $manager->persist($berlioz);
        $manager->persist($pasteur);
        $manager->persist($einstein);
        $manager->persist($apollon);
        $manager->persist($athena);
        $manager->persist($hermes);
        $manager->flush();

        $this->addReference("Berlioz", $berlioz);
        $this->addReference("Pasteur", $pasteur);
        $this->addReference("Einstein", $einstein);
        $this->addReference("Apollon", $apollon);
        $this->addReference("Athéna", $athena);
        $this->addReference("Hermès", $hermes);
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
            BuildingFixture::class,
        ];
    }
}
