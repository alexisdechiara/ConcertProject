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
        $leJt = new Band();
        $leJt ->setName('Le JT de 20h')
              ->addArtist($this->getReference("David Pujadas"))
              ->addArtist($this->getReference("Anne-Sophie Lapix"))
              ->addArtist($this->getReference("Claire Chazal"))
              ->addArtist($this->getReference("PPDA"))
              ->addArtist($this->getReference("Thomas Sotto"))
              ->addStyle($this->getReference("Rock"));

        $spideys = new Band();
        $spideys ->setName('The Spideys')
                 ->addArtist($this->getReference("Tobey Maguire"))
                 ->addArtist($this->getReference("Andrew Garfield"))
                 ->addArtist($this->getReference("Tom Holland"))
                 ->addStyle($this->getReference("Jazz"));

        $manager->persist($leJt);
        $manager->persist($spideys);
        $manager->flush();

        $this->addReference("leJT", $leJt);
        $this->addReference("Spideys", $spideys);
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
