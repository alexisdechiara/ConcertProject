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
                ->setCapacity(3000)
                ->setMapUrl("https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.628250011457!2d3.8797321154964863!3d43.61428137912264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6af0bed9ab393%3A0x6013d7e9fd58ad8f!2sCorum!5e0!3m2!1sfr!2sfr!4v1642283733892!5m2!1sfr!2sfr");

        $manager->persist($corum);
        $manager->flush();

        $this->addReference("corum", $corum);
    }
}
