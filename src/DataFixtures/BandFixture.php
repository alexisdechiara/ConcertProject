<?php

namespace App\DataFixtures;

use App\Entity\Band;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BandFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $pomme      = new Band();
        $pomme      ->setName("Pomme")
                    ->addArtist($this->getReference("pomme"))
                    ->setDescription("Claire Pommet, dite Pomme, née le 2 août 1996 à Décines-Charpieu (Rhône), est une auteure-compositrice-interprète et musicienne française.")
                    ->setProfileImage("https://m.media-amazon.com/images/I/71ZwGbmRUmL._SL1400_.jpg")
                    ->setBackgroundImage("https://www.live-actu.com/wp-content/uploads/2020/01/Pomme-Les-failles-tour-2020.jpg")
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"))
                    ->addStyle($this->getReference("folk"));

        $calogero   = new Band();
        $calogero   ->setName("Calogero")
                    ->addArtist($this->getReference("calogero"))
                    ->setDescription("Calogero, de son vrai nom Calogero Joseph Salvatore Maurici, né le 30 juillet 1971 à Échirolles (Isère), est un chanteur, compositeur et musicien français.")
                    ->setProfileImage("https://static.fnac-static.com/multimedia/Images/FR/NR/5e/ee/c0/12643934/1540-1/tsp20200827152640/Centre-Ville-Edition-Limitee.jpg")
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"))
                    ->addStyle($this->getReference("rock"));


        $orelsan    = new Band();
        $orelsan    ->setName("OrelSan")
                    ->addArtist($this->getReference("orelsan"))
                    ->setDescription("Orelsan (/ɔʁɛlˈsan/), de son vrai nom Aurélien Cotentin, né le 1er août 1982 à Alençon (Orne), est un rappeur, compositeur, acteur, réalisateur et scénariste français.")
                    ->setProfileImage("https://static.fnac-static.com/multimedia/Images/FR/NR/f8/b2/d3/13873912/1540-1/tsp20211109110103/Civilisation.jpg")
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("rap"));

        $angele     = new Band();
        $angele     ->setName("Angèle")
                    ->addArtist($this->getReference("angele"))
                    ->setDescription("Angèle Van Laeken, dite Angèle, née le 3 décembre 1995 à Uccle (Bruxelles-Capitale), est une auteure-compositrice-interprète, musicienne, productrice, actrice et mannequin belge.")
                    ->setProfileImage("https://media1.ledevoir.com/images_galerie/nwdp_1069029_871809/image.jpg")
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"));

        $bigfloOli  = new Band();
        $bigfloOli  ->setName("Bigflo & Oli ")
                    ->addArtist($this->getReference("bigflo"))
                    ->addArtist($this->getReference("oli"))
                    ->setDescription("Bigflo et Oli, parfois abrégé B&O, est un groupe de rap français, originaire de Toulouse. Le duo est composé des frères Florian « Bigflo » et Olivio « Oli » Ordonez.")
                    ->setProfileImage("https://image-api.nrj.fr/medias/2020/10/dsc-9990bobyboby_5f929e663c4a1.jpg")
                    ->setBackgroundImage("https://m.media-amazon.com/images/I/81J11-PQrFL._SL1200_.jpg")
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("hipHop"));

        $maelle     = new Band();
        $maelle     ->setName("Maëlle")
                    ->addArtist($this->getReference("maelle"))
                    ->setDescription("Maëlle Pistoia, dite Maëlle, est une chanteuse française, née le 4 janvier 2001 à Tournus (Saône-et-Loire).")
                    ->setBackgroundImage("https://s1.dmcdn.net/v/O5eTO1UHSUYV2LLFs/x1080")
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"));

        $manager->persist($pomme);
        $manager->persist($calogero);
        $manager->persist($angele);
        $manager->persist($bigfloOli);
        $manager->persist($maelle);
        $manager->flush();

        $this->addReference("pommeBand", $pomme);
        $this->addReference("calogeroBand", $calogero);
        $this->addReference("angeleBand", $angele);
        $this->addReference("bigfloOliBand", $bigfloOli);
        $this->addReference("maelleBand", $maelle);
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
            ArtistFixture::class,
            StyleFixture::class,
        ];
    }
}
