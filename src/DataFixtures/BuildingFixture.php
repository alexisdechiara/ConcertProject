<?php

namespace App\DataFixtures;

use App\Entity\Building;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BuildingFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $corum = new Building();
        $corum ->setName("Corum")
            ->setLocation("Place Charles de Gaulle, 34000 Montpellier")
            ->setCapacity(3000);

        $acropolis = new Building();
        $acropolis ->setName("Acropolis")
            ->setLocation("1 Esplanade John Fitzgerald Kennedy, 06000 Nice");

        $manager->persist($corum);
        $manager->persist($acropolis);
        $manager->flush();

        $this->addReference("Corum", $corum);
        $this->addReference("Acropolis", $acropolis);
    }
}
