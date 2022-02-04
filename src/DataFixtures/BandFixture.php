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
                    ->setCoverImage($this->getReference("pommeCover"))
                    ->setBannerImage($this->getReference("pommeBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"))
                    ->addStyle($this->getReference("folk"));

        $calogero   = new Band();
        $calogero   ->setName("Calogero")
                    ->addArtist($this->getReference("calogero"))
                    ->setDescription("Calogero, de son vrai nom Calogero Joseph Salvatore Maurici, né le 30 juillet 1971 à Échirolles (Isère), est un chanteur, compositeur et musicien français.")
                    ->setCoverImage($this->getReference("calogeroCover"))
                    ->setBannerImage($this->getReference("calogeroBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"))
                    ->addStyle($this->getReference("rock"));


        $orelsan    = new Band();
        $orelsan    ->setName("Orelsan")
                    ->addArtist($this->getReference("orelsan"))
                    ->setDescription("Orelsan (/ɔʁɛlˈsan/), de son vrai nom Aurélien Cotentin, né le 1er août 1982 à Alençon (Orne), est un rappeur, compositeur, acteur, réalisateur et scénariste français.")
                    ->setCoverImage($this->getReference("orelsanCover"))
                    ->setBannerImage($this->getReference("orelsanBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("rap"))
                    ->addStyle($this->getReference("hipHop"));

        $angele     = new Band();
        $angele     ->setName("Angèle")
                    ->addArtist($this->getReference("angele"))
                    ->setDescription("Angèle Van Laeken, dite Angèle, née le 3 décembre 1995 à Uccle (Bruxelles-Capitale), est une auteure-compositrice-interprète, musicienne, productrice, actrice et mannequin belge.")
                    ->setCoverImage($this->getReference("angeleCover"))
                    ->setBannerImage($this->getReference("angeleBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"));

        $bigfloOli  = new Band();
        $bigfloOli  ->setName("Bigflo & Oli ")
                    ->addArtist($this->getReference("bigflo"))
                    ->addArtist($this->getReference("oli"))
                    ->setDescription("Bigflo et Oli, parfois abrégé B&O, est un groupe de rap français, originaire de Toulouse. Le duo est composé des frères Florian « Bigflo » et Olivio « Oli » Ordonez.")
                    ->setCoverImage($this->getReference("bigfloEtOliCover"))
                    ->setBannerImage($this->getReference("bigfloEtOliBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("hipHop"));

        $maelle     = new Band();
        $maelle     ->setName("Maëlle")
                    ->addArtist($this->getReference("maelle"))
                    ->setDescription("Maëlle Pistoia, dite Maëlle, est une chanteuse française, née le 4 janvier 2001 à Tournus (Saône-et-Loire).")
                    ->setCoverImage($this->getReference("maelleCover"))
                    ->setBannerImage($this->getReference("maelleBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"));

        $barbara    = new Band();
        $barbara    ->setName("Barbara pravi")
                    ->addArtist($this->getReference("barbara"))
                    ->setDescription("Barbara Piévic, dite Barbara Pravi, est une auteure-compositrice-interprète française, née le 10 avril 1993 à Paris. Elle est révélée par sa participation au spectacle Un été 44 en 2016, et connue pour s'engager en faveur des droits des femmes. Elle représente la France au Concours Eurovision de la chanson 2021 avec sa chanson Voilà, terminant en deuxième position au classement final derrière le groupe italien Måneskin. C’est le meilleur classement français au concours international depuis 1991.")
                    ->setCoverImage($this->getReference("barbaraCover"))
                    ->setBannerImage($this->getReference("barbaraBanner"))
                    ->addStyle($this->getReference("french"));

        $hoshi      = new Band();
        $hoshi      ->setName("Hoshi")
                    ->addArtist($this->getReference("hoshi"))
                    ->setDescription("Mathilde Gerner, dite Hoshi, est une auteure-compositrice-interprète française, née le 14 septembre 1996 à Versailles.")
                    ->setCoverImage($this->getReference("hoshiCover"))
                    ->setBannerImage($this->getReference("hoshiBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("pop"));

        $benMazue   = new Band();
        $benMazue   ->setName("Ben Mazué")
                    ->addArtist($this->getReference("benMazue"))
                    ->setDescription("Benjamin Mazuet, dit Ben Mazué, est un auteur-compositeur-interprète et musicien français, né le 24 janvier 1981 à Nice. Il se lance dans la musique à l'âge de 25 ans. Récompensé par le prix SACEM des découvertes en 2006 et le prix Paris Jeunes Talents en 2008, il est lauréat du FAIR en 2010. Mazué signe chez Columbia, qui édite son premier album en 2011.")
                    ->setCoverImage($this->getReference("benMazueCover"))
                    ->setBannerImage($this->getReference("benMazueBanner"))
                    ->addStyle($this->getReference("french"));

        $suzane     = new Band();
        $suzane     ->setName("Suzane")
                    ->addArtist($this->getReference("suzane"))
                    ->setDescription("Océane Colom, dite Suzane, née le 29 décembre 1990 à Avignon, est une auteure-compositrice-interprète française. Elle se fait connaître en 2019 par sa présence sur la scène française, avant de publier son premier album, Toï Toï, l'année suivante. Elle est récompensée de la Victoire de la révélation scène lors des Victoires de la musique 2020.")
                    ->setCoverImage($this->getReference("suzaneCover"))
                    ->setBannerImage($this->getReference("suzaneBanner"))
                    ->addStyle($this->getReference("french"));

        $stromae    = new Band();
        $stromae    ->setName("Stromae")
                    ->addArtist($this->getReference("stromae"))
                    ->setDescription("Stromae , de son vrai nom Paul Van Haver, né le 12 mars 1985 à Bruxelles, est un auteur-compositeur-interprète belge d'origine belgo-rwandaise. Il s'illustre autant dans le hip-hop que dans la musique électronique en passant par la chanson française.")
                    ->setCoverImage($this->getReference("stromaeCover"))
                    ->setBannerImage($this->getReference("stromaeBanner"))
                    ->addStyle($this->getReference("french"))
                    ->addStyle($this->getReference("hipHop"));

        $manager->persist($pomme);
        $manager->persist($calogero);
        $manager->persist($angele);
        $manager->persist($bigfloOli);
        $manager->persist($maelle);
        $manager->persist($orelsan);
        $manager->persist($barbara);
        $manager->persist($hoshi);
        $manager->persist($benMazue);
        $manager->persist($suzane);
        $manager->persist($stromae);
        $manager->flush();

        $this->addReference("pommeBand", $pomme);
        $this->addReference("calogeroBand", $calogero);
        $this->addReference("angeleBand", $angele);
        $this->addReference("bigfloOliBand", $bigfloOli);
        $this->addReference("maelleBand", $maelle);
        $this->addReference("orelsanBand", $orelsan);
        $this->addReference("barbaraBand", $barbara);
        $this->addReference("hoshiBand", $hoshi);
        $this->addReference("benMazueBand", $benMazue);
        $this->addReference("suzaneBand", $suzane);
        $this->addReference("stromaeBand", $stromae);
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
            ImageFixture::class,
        ];
    }
}
