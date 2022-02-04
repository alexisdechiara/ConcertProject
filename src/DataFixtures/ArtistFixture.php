<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArtistFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $pomme      = new Artist();
        $pomme      ->setStageName("Pomme")
                    ->setFirstName("Claire")
                    ->setLastName("Pommet")
                    ->setPicture($this->getReference("pommePicture"))
                    ->setGender(2)
                    ->setRole("singer");


        $calogero   = new Artist();
        $calogero   ->setStageName("Calogero")
                    ->setFirstName("Calogero")
                    ->setLastName("Joseph Salvatore Maurici")
                    ->setPicture($this->getReference("calogeroPicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $orelsan    = new Artist();
        $orelsan    ->setStageName("OrelSan")
                    ->setFirstName("Aurélien")
                    ->setLastName("Cotentin")
                    ->setPicture($this->getReference("orelsanPicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $angele     = new Artist();
        $angele     ->setStageName("Angèle")
                    ->setFirstName("Angèle")
                    ->setLastName("Van Laeken")
                    ->setPicture($this->getReference("angelePicture"))
                    ->setGender(2)
                    ->setRole("singer");

        $bigflo     = new Artist();
        $bigflo     ->setStageName("Bigflo")
                    ->setFirstName("Florian")
                    ->setLastName("Ordonez")
                    ->setPicture($this->getReference("bigfloPicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $oli        = new Artist();
        $oli        ->setStageName("Oli")
                    ->setFirstName("Olivio")
                    ->setLastName("Ordonez")
                    ->setPicture($this->getReference("oliPicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $barbara    = new Artist();
        $barbara    ->setStageName("Barbara Pravi")
                    ->setFirstName("Barbara")
                    ->setLastName("Piévic")
                    ->setPicture($this->getReference("barbaraPicture"))
                    ->setGender(2)
                    ->setRole("singer");

        $hoshi      = new Artist();
        $hoshi      ->setStageName("Hoshi")
                    ->setFirstName("Mathilde")
                    ->setLastName("Gerner")
                    ->setPicture($this->getReference("hoshiPicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $benMazue   = new Artist();
        $benMazue   ->setStageName("Ben Mazué")
                    ->setFirstName("Benjamin")
                    ->setLastName("Mazuet")
                    ->setPicture($this->getReference("benMazuePicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $maelle     = new Artist();
        $maelle     ->setStageName("Maëlle")
                    ->setFirstName("Maëlle")
                    ->setLastName("Pistoia")
                    ->setPicture($this->getReference("maellePicture"))
                    ->setGender(2)
                    ->setRole("singer");

        $suzane     = new Artist();
        $suzane     ->setStageName("Suzanne")
                    ->setFirstName("Océane")
                    ->setLastName("Colom")
                    ->setPicture($this->getReference("suzanePicture"))
                    ->setGender(2)
                    ->setRole("singer");

        $gcm        = new Artist();
        $gcm        ->setStageName("Grand Corps Malade")
                    ->setFirstName("Fabien")
                    ->setLastName("Marsaud")
                    ->setPicture($this->getReference("gcmPicture"))
                    ->setGender(1)
                    ->setRole("singer");

        $louane     = new Artist();
        $louane     ->setStageName("Louane")
                    ->setFirstName("Anne")
                    ->setLastName("Peichert")
                    ->setPicture($this->getReference("louanePicture"))
                    ->setGender(2)
                    ->setRole("singer");

        $stromae    = new Artist();
        $stromae    ->setStageName("Stromae")
                    ->setFirstName("Paul")
                    ->setLastName("Van Haver")
                    ->setPicture($this->getReference("stromaePicture"))
                    ->setGender(1)
                    ->setRole("singer");

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
        $manager->persist($pomme);
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

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @psalm-return array<class-string<FixtureInterface>>
     */
    public function getDependencies(): array
    {
        return [
            ImageFixture::class,
        ];
    }
}
