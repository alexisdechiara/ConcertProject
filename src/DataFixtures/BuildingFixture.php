<?php

namespace App\DataFixtures;

use App\Entity\Building;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BuildingFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $corum  = new Building();
        $corum  ->setName("Corum")
                ->setLocation("Place Charles de Gaulle, 34000 Montpellier")
                ->setCapacity(3000);

        $manager->persist($corum);
        $manager->flush();

        $this->addReference("corum", $corum);
    }
}
