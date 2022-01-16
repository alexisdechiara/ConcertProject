<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StyleFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $country = new Style();
        $country ->setName("country");

        $blues = new Style();
        $blues ->setName("blues");

        $disco = new Style();
        $disco ->setName("disco");

        $electro = new Style();
        $electro ->setName("electro");

        $folk = new Style();
        $folk ->setName("folk");

        $funk = new Style();
        $funk ->setName("funk");

        $hipHop = new Style();
        $hipHop ->setName("hip-hop");

        $jazz = new Style();
        $jazz ->setName("jazz");

        $metal = new Style();
        $metal ->setName("metal");

        $pop = new Style();
        $pop ->setName("pop");

        $punk = new Style();
        $punk ->setName("punk");

        $rap = new Style();
        $rap ->setName("rap");

        $reggae = new Style();
        $reggae ->setName("reggae");

        $rnb = new Style();
        $rnb ->setName("rnb");

        $rock = new Style();
        $rock ->setName("rock");

        $salsa = new Style();
        $salsa ->setName("salsa");

        $soul = new Style();
        $soul ->setName("soul");

        $techno = new Style();
        $techno ->setName("techno");

        $french = new Style();
        $french ->setName("french");

        $manager->persist($country);
        $manager->persist($blues);
        $manager->persist($disco);
        $manager->persist($electro);
        $manager->persist($folk);
        $manager->persist($french);
        $manager->persist($funk);
        $manager->persist($hipHop);
        $manager->persist($jazz);
        $manager->persist($metal);
        $manager->persist($pop);
        $manager->persist($punk);
        $manager->persist($rap);
        $manager->persist($reggae);
        $manager->persist($rnb);
        $manager->persist($rock);
        $manager->persist($salsa);
        $manager->persist($soul);
        $manager->persist($techno);
        $manager->flush();


        $this->addReference("country", $country);
        $this->addReference("blues", $blues);
        $this->addReference("disco", $disco);
        $this->addReference("electro", $electro);
        $this->addReference("folk", $folk);
        $this->addReference("french", $french);
        $this->addReference("funk", $funk);
        $this->addReference("hipHop", $hipHop);
        $this->addReference("jazz", $jazz);
        $this->addReference("metal", $metal);
        $this->addReference("pop", $pop);
        $this->addReference("punk", $punk);
        $this->addReference("rap", $rap);
        $this->addReference("rnb", $rnb);
        $this->addReference("rock", $rock);
        $this->addReference("salsa", $salsa);
        $this->addReference("soul", $soul);
        $this->addReference("techno", $techno);
    }
}
