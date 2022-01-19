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
            ->setBuilding($this->getReference("corum"));

        $pasteur = new Hall();
        $pasteur ->setName("Pasteur")
            ->setCapacity(745)
            ->setBuilding($this->getReference("corum"));

        $einstein = new Hall();
        $einstein ->setName("Einstein")
            ->setCapacity(318)
            ->setBuilding($this->getReference("corum"));

        $manager->persist($berlioz);
        $manager->persist($pasteur);
        $manager->persist($einstein);
        $manager->flush();

        $this->addReference("Berlioz", $berlioz);
        $this->addReference("Pasteur", $pasteur);
        $this->addReference("Einstein", $einstein);
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
