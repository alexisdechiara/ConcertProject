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

        $this->extracted($manager, $country, $blues, $disco, $electro, $folk, $funk, $hipHop, $jazz, $metal);
        $this->extracted($manager, $pop, $punk, $rap, $reggae, $rnb, $rock, $salsa, $soul, $techno);
        $manager->flush();


        $this->addReference("country", $country);
        $this->addReference("Blues", $blues);
        $this->addReference("Disco", $disco);
        $this->addReference("Electro", $electro);
        $this->addReference("Folk", $folk);
        $this->addReference("Funk", $funk);
        $this->addReference("Hip-hop", $hipHop);
        $this->addReference("Jazz", $jazz);
        $this->addReference("Metal", $metal);
        $this->addReference("Pop", $pop);
        $this->addReference("Punk", $punk);
        $this->addReference("Rap", $rap);
        $this->addReference("Rnb", $rnb);
        $this->addReference("Rock", $rock);
        $this->addReference("Salsa", $salsa);
        $this->addReference("Soul", $soul);
        $this->addReference("Techno", $techno);
    }

    /**
     * @param ObjectManager $manager
     * @param Style $pop
     * @param Style $punk
     * @param Style $rap
     * @param Style $reggae
     * @param Style $rnb
     * @param Style $rock
     * @param Style $salsa
     * @param Style $soul
     * @param Style $techno
     * @return void
     */
    public function extracted(ObjectManager $manager, Style $pop, Style $punk, Style $rap, Style $reggae, Style $rnb, Style $rock, Style $salsa, Style $soul, Style $techno): void
    {
        $manager->persist($pop);
        $manager->persist($punk);
        $manager->persist($rap);
        $manager->persist($reggae);
        $manager->persist($rnb);
        $manager->persist($rock);
        $manager->persist($salsa);
        $manager->persist($soul);
        $manager->persist($techno);
    }
}
