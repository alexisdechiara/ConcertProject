<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $davidPujadas = new Artist();
        $davidPujadas ->setFirstName("David")
                      ->setLastName("Pujadas")
                      ->setGender("Male")
                      ->setRole("singer");

        $claireChazal = new Artist();
        $claireChazal ->setFirstName("Claire")
                      ->setLastName("Chazal")
                      ->setgender("Female")
                      ->setRole("Beater");

        $ppda = new Artist();
        $ppda ->setFirstName("Patrick")
              ->setLastName("Poivre d'Arvor")
              ->setGender("Male")
              ->setRole("Pianist");

        $anneSophieLapix = new Artist();
        $anneSophieLapix ->setFirstName("Anne-Sophie")
                         ->setLastName("Lapix")
                         ->setGender("Female")
                         ->setRole("Singer");

        $thomasSotto = new Artist();
        $thomasSotto ->setFirstName("Thomas")
                     ->setLastName("Sotto")
                     ->setGender("Male")
                     ->setRole("Guitarist");

        $tobeyMaguire = new Artist();
        $tobeyMaguire ->setFirstName("Tobey")
                      ->setLastName("Maguire")
                      ->setGender("Male")
                      ->setRole("Singer");

        $andrewGarfield = new Artist();
        $andrewGarfield ->setFirstName("Andrew")
                        ->setLastName("Garfield")
                        ->setGender("Male")
                        ->setRole("Singer");

        $tomHolland = new Artist();
        $tomHolland ->setFirstName("Tom")
                    ->setLastName("Holland")
                    ->setGender("Male")
                    ->setRole("Singer");


        $manager->persist($davidPujadas);
        $manager->persist($claireChazal);
        $manager->persist($ppda);
        $manager->persist($anneSophieLapix);
        $manager->persist($thomasSotto);
        $manager->persist($tobeyMaguire);
        $manager->persist($andrewGarfield);
        $manager->persist($tomHolland);
        $manager->flush();

        $this->addReference("David Pujadas", $davidPujadas);
        $this->addReference("Claire Chazal", $claireChazal);
        $this->addReference("PPDA", $ppda);
        $this->addReference("Anne-Sophie Lapix", $anneSophieLapix);
        $this->addReference("Thomas Sotto", $thomasSotto);
        $this->addReference("Tobey Maguire", $tobeyMaguire);
        $this->addReference("Andrew Garfield", $andrewGarfield);
        $this->addReference("Tom Holland", $tomHolland);
    }
}
