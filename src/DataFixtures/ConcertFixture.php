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
                            ->setDate(new DateTime('2022-04-28'))
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
                            ->setDate(new DateTime('2022-01-31'))
                            ->settime(new DateTime('17:15:00'))
                            ->setDuration(new DateInterval('PT4H'));

        $multitudeTour      = new Concert();
        $multitudeTour      ->setName('STROMAE - Multitude tour')
                            ->setCoverImage($this->getReference('multitudeTourCover'))
                            ->setBannerImage($this->getReference('multitudeTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-14'))
                            ->settime(new DateTime('20:07:00'))
                            ->setDuration(new DateInterval('PT2H'));

        $nonanteCinq        = new Concert();
        $nonanteCinq        ->setName('Nonante-cinq tour')
                            ->setCoverImage($this->getReference('nonanteCinqTourCover'))
                            ->setBannerImage($this->getReference('nonanteCinqTourBanner'))
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('2022-02-08'))
                            ->settime(new DateTime('21:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $manager->persist($failleTour);
        $manager->persist($calogeroConcert);
        $manager->persist($toiToi);
        $manager->persist($multitudeTour);
        $manager->persist($nonanteCinq);
        $manager->flush();

        $this->addReference("failleTour", $failleTour);
        $this->addReference("calogeroConcert", $calogeroConcert);
        $this->addReference("toiToi", $toiToi);
        $this->addReference("multitudeTour", $multitudeTour);
        $this->addReference("nonanteCinq", $nonanteCinq);
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
