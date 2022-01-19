<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use DateInterval;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\File;

class ConcertFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $failleTour         = new Concert();
        $failleTour         ->setName('Les failles tour')
                            ->setCoverImage("https://musicshaker.fr/wp-content/uploads/2019/11/pomme-1.png")
                            ->setBannerImage('src/DataFixtures/img/concert/pomme_concert_banner.jpg')
                            ->setDescription("Résolument folk, elle compose aussi bien en français qu'en anglais, laissant parfois un semblant de country transpirer de ses mélodies. Ses textes, personnels et d'une déroutante maturité, évoquent avec sensibilité mais sans mélancolie les émotions à fleur de peau des jeunes gens de son âge.")
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('04/28/2022 21:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $calogeroConcert    = new Concert();
        $calogeroConcert    ->setName('Calogero en concert')
                            ->setBannerImage('src/DataFixtures/img/calogero_concert_banner.jpg')
                            ->setCoverImage("https://statics-infoconcert.digitick.com/media/a_effacer/calogero_concert_tour22_visunews1121.jpg")
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('03/09/2022 18:00:00'))
                            ->setDuration(new DateInterval('PT3H'));

        $toiToi             = new Concert();
        $toiToi             ->setName('TOÏ TOÏ')
                            ->setCoverImage('https://wspectacle.fr/media/cache/w980/uploads/artist_image/0a13261d156dc277537304911ceedf53b97bcd8e.jpeg')
                            ->setBannerImage('src/DataFixtures/img/concert/suzane_concert_banner.jpg')
                            ->setHall($this->getReference('Berlioz'))
                            ->setDate(new DateTime('01/20/2022 17:15:00'))
                            ->setDuration(new DateInterval('PT4H'));

        $manager->persist($failleTour);
        $manager->persist($calogeroConcert);
        $manager->persist($toiToi);
        $manager->flush();

        $this->addReference("failleTour", $failleTour);
        $this->addReference("calogeroConcert", $calogeroConcert);
        $this->addReference("toiToi", $toiToi);
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
