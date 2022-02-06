<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use DateInterval;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConcertFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $failleTour         = new Concert();
        $failleTour         ->setName('Les failles tour')
                            ->setCoverImage($this->getReference('failleTourCover'))
                            ->setBannerImage($this->getReference('failleTourBanner'))
                            ->setDescription("Résolument folk, elle compose aussi bien en français qu'en anglais, laissant parfois un semblant de country transpirer de ses mélodies. Ses textes, personnels et d'une déroutante maturité, évoquent avec sensibilité mais sans mélancolie les émotions à fleur de peau des jeunes gens de son âge.")
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2021-04-28'))
                            ->setTime(new DateTime('21:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $calogeroConcert    = new Concert();
        $calogeroConcert    ->setName('Calogero en concert')
                            ->setCoverImage($this->getReference('calogeroConcertCover'))
                            ->setBannerImage($this->getReference('calogeroConcertBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-03-09'))
                            ->setTime(new DateTime('18:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $toiToi             = new Concert();
        $toiToi             ->setName('TOÏ TOÏ')
                            ->setCoverImage($this->getReference('toiToiCover'))
                            ->setBannerImage($this->getReference('toiToiBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-11'))
                            ->settime(new DateTime('17:15:00'))
                            ->setDuration(new DateInterval('PT4H'));

        $multitudeTour      = new Concert();
        $multitudeTour      ->setName('STROMAE - Multitude tour')
                            ->setCoverImage($this->getReference('multitudeTourCover'))
                            ->setBannerImage($this->getReference('multitudeTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-06-25'))
                            ->settime(new DateTime('20:07:00'))
                            ->setDuration(new DateInterval('PT2H'));

        $nonanteCinq        = new Concert();
        $nonanteCinq        ->setName('Nonante-cinq tour')
                            ->setCoverImage($this->getReference('nonanteCinqTourCover'))
                            ->setBannerImage($this->getReference('nonanteCinqTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-14'))
                            ->settime(new DateTime('21:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $bigfloEtOliConcert = new Concert();
        $bigfloEtOliConcert ->setName('Bigflo et Oli en concert')
                            ->setCoverImage($this->getReference('bigfloEtOliTourCover'))
                            ->setBannerImage($this->getReference('bigfloEtOliTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2020-09-02'))
                            ->settime(new DateTime('17:45:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $barbaraTournee     = new Concert();
        $barbaraTournee     ->setName('Barbara en tournée')
                            ->setCoverImage($this->getReference('barbaraTourCover'))
                            ->setBannerImage($this->getReference('barbaraTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-28'))
                            ->settime(new DateTime('17:45:00'))
                            ->setDuration(new DateInterval('PT2H'));

        $hoshiTour          = new Concert();
        $hoshiTour          ->setName('Hoshi tour')
                            ->setCoverImage($this->getReference('hoshiTourCover'))
                            ->setBannerImage($this->getReference('hoshiTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2021-01-13'))
                            ->settime(new DateTime('15:30:00'))
                            ->setDuration(new DateInterval('PT4H'));

        $orelsanTour        = new Concert();
        $orelsanTour        ->setName('Orelsan tournée 2022')
                            ->setCoverImage($this->getReference('orelsanTourCover'))
                            ->setBannerImage($this->getReference('orelsanTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-28'))
                            ->settime(new DateTime('22:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $paradisTour        = new Concert();
        $paradisTour        ->setName('Paradis tour')
                            ->setCoverImage($this->getReference('paradisTourCover'))
                            ->setBannerImage($this->getReference('paradisTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-03-21'))
                            ->settime(new DateTime('20:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $lesEnfoires        = new Concert();
        $lesEnfoires        ->setName('Les enfoirés 2022')
                            ->setCoverImage($this->getReference('lesEnfoiresCover'))
                            ->setBannerImage($this->getReference('lesEnfoiresBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-28'))
                            ->settime(new DateTime('18:00:00'))
                            ->setDuration(new DateInterval('PT6H'));

        $manager->persist($failleTour);
        $manager->persist($calogeroConcert);
        $manager->persist($toiToi);
        $manager->persist($multitudeTour);
        $manager->persist($nonanteCinq);
        $manager->persist($bigfloEtOliConcert);
        $manager->persist($barbaraTournee);
        $manager->persist($hoshiTour);
        $manager->persist($orelsanTour);
        $manager->persist($paradisTour);
        $manager->persist($lesEnfoires);
        $manager->flush();

        $this->addReference("failleTour", $failleTour);
        $this->addReference("calogeroConcert", $calogeroConcert);
        $this->addReference("toiToi", $toiToi);
        $this->addReference("multitudeTour", $multitudeTour);
        $this->addReference("nonanteCinq", $nonanteCinq);
        $this->addReference("bigfloEtOliConcert", $bigfloEtOliConcert);
        $this->addReference("barbaraTournee", $barbaraTournee);
        $this->addReference("hoshiTour", $hoshiTour);
        $this->addReference("orelsanTour", $orelsanTour);
        $this->addReference("paradisTour", $paradisTour);
        $this->addReference("lesEnfoires", $lesEnfoires);
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
            HallFixture::class,
            ImageFixture::class,
        ];
    }
}
