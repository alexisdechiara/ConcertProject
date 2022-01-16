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
                            ->setImage("https://musicshaker.fr/wp-content/uploads/2019/11/pomme-1.png")
                            ->setDescription("Résolument folk, elle compose aussi bien en français qu'en anglais, laissant parfois un semblant de country transpirer de ses mélodies. Ses textes, personnels et d'une déroutante maturité, évoquent avec sensibilité mais sans mélancolie les émotions à fleur de peau des jeunes gens de son âge.")
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('04/28/2022 21:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $calogeroConcert    = new Concert();
        $calogeroConcert    ->setName('Calogéro en concert')
                            ->setImage("https://statics-infoconcert.digitick.com/media/a_effacer/calogero_concert_tour22_visunews1121.jpg")
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('03/09/2022 18:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $manager->persist($failleTour);
        $manager->persist($calogeroConcert);
        $manager->flush();

        $this->addReference("failleTour", $failleTour);
        $this->addReference("calogeroConcert", $calogeroConcert);
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
        ];
    }
}
