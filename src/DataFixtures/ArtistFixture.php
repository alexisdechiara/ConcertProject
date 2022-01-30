<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $pomme      = new Artist();
        $pomme      ->setStageName("Pomme")
                    ->setFirstName("Claire")
                    ->setLastName("Pommet")
                    ->setPicture("img/artist/pomme-picture.jpg")
                    ->setGender(2)
                    ->setRole("singer");

        $calogero   = new Artist();
        $calogero   ->setStageName("Calogero")
                    ->setFirstName("Calogero")
                    ->setLastName("Joseph Salvatore Maurici")
                    ->setPicture("img/artist/calogero-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $orelsan    = new Artist();
        $orelsan    ->setStageName("OrelSan")
                    ->setFirstName("Aurélien")
                    ->setLastName("Cotentin")
                    ->setPicture("img/artist/orelsan-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $angele     = new Artist();
        $angele     ->setStageName("Angèle")
                    ->setFirstName("Angèle")
                    ->setLastName("Van Laeken")
                    ->setPicture("img/artist/angele-picture.jpg")
                    ->setGender(2)
                    ->setRole("singer");

        $bigflo     = new Artist();
        $bigflo     ->setStageName("Bigflo")
                    ->setFirstName("Florian")
                    ->setLastName("Ordonez")
                    ->setPicture("img/artist/bigflo-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $oli        = new Artist();
        $oli        ->setStageName("Oli")
                    ->setFirstName("Olivio")
                    ->setLastName("Ordonez")
                    ->setPicture("img/artist/oli-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $barbara    = new Artist();
        $barbara    ->setStageName("Barbara Pravi")
                    ->setFirstName("Barbara")
                    ->setLastName("Piévic")
                    ->setPicture("img/artist/barbara-picture.jpg")
                    ->setGender(2)
                    ->setRole("singer");

        $hoshi      = new Artist();
        $hoshi      ->setStageName("Hoshi")
                    ->setFirstName("Mathilde")
                    ->setLastName("Gerner")
                    ->setPicture("img/artist/hoshi-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $benMazue   = new Artist();
        $benMazue   ->setStageName("Ben Mazué")
                    ->setFirstName("Benjamin")
                    ->setLastName("Mazuet")
                    ->setPicture("img/artist/benMazue-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $maelle     = new Artist();
        $maelle     ->setStageName("Maëlle")
                    ->setFirstName("Maëlle")
                    ->setLastName("Pistoia")
                    ->setPicture("img/artist/maelle-picture.webp")
                    ->setGender(2)
                    ->setRole("singer");

        $suzane     = new Artist();
        $suzane     ->setStageName("Suzanne")
                    ->setFirstName("Océane")
                    ->setLastName("Colom")
                    ->setPicture("img/artist/suzane-picture.png")
                    ->setGender(2)
                    ->setRole("singer");

        $gcm        = new Artist();
        $gcm        ->setStageName("Grand Corps Malade")
                    ->setFirstName("Fabien")
                    ->setLastName("Marsaud")
                    ->setPicture("img/artist/gcm-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $louane     = new Artist();
        $louane     ->setStageName("Louane")
                    ->setFirstName("Anne")
                    ->setLastName("Peichert")
                    ->setPicture("img/artist/louane-picture.jpg")
                    ->setGender(2)
                    ->setRole("singer");

        $stromae    = new Artist();
        $stromae    ->setStageName("Stromae")
                    ->setFirstName("Paul")
                    ->setLastName("Van Haver")
                    ->setPicture("img/artist/stromae-picture.jpg")
                    ->setGender(1)
                    ->setRole("singer");

        $manager->persist($pomme);
        $manager->persist($calogero);
        $manager->persist($orelsan);
        $manager->persist($angele);
        $manager->persist($bigflo);
        $manager->persist($oli);
        $manager->persist($barbara);
        $manager->persist($hoshi);
        $manager->persist($benMazue);
        $manager->persist($maelle);
        $manager->persist($suzane);
        $manager->persist($gcm);
        $manager->persist($louane);
        $manager->persist($stromae);
        $manager->flush();

        $this->addReference("pomme", $pomme);
        $this->addReference("calogero", $calogero);
        $this->addReference("orelsan", $orelsan);
        $this->addReference("angele", $angele);
        $this->addReference("bigflo", $bigflo);
        $this->addReference("oli", $oli);
        $this->addReference("barbara", $barbara);
        $this->addReference("hoshi", $hoshi);
        $this->addReference("benMazue", $benMazue);
        $this->addReference("maelle", $maelle);
        $this->addReference("suzane", $suzane);
        $this->addReference("gcm", $gcm);
        $this->addReference("louane", $louane);
        $this->addReference("stromae", $stromae);
    }
}
