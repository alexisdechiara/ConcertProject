<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $pomme      = new Artist();
        $pomme      ->setStageName("Pomme")
                    ->setFirstName("Claire")
                    ->setLastName("Pommet")
                    ->setPicture("https://www.bonsound.com/download/uploads/press-photos/pomme2019_4x6-1580244710.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $calogero   = new Artist();
        $calogero   ->setStageName("Calogero")
                    ->setFirstName("Calogero")
                    ->setLastName("Joseph Salvatore Maurici")
                    ->setPicture("https://yt3.ggpht.com/ytc/AKedOLScqTO7c-oVvOtH6afRrc4BuXmVKBNWq4QzloL57Q=s900-c-k-c0x00ffffff-no-rj")
                    ->setRole("Singer");

        $orelsan    = new Artist();
        $orelsan    ->setStageName("OrelSan")
                    ->setFirstName("Aurélien")
                    ->setLastName("Cotentin")
                    ->setPicture("https://img.20mn.fr/FlZ5nnZiSOC6n7Vq-k0L1ik/768x492_rappeur-orelsan.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $angele     = new Artist();
        $angele     ->setStageName("Angèle")
                    ->setFirstName("Angèle")
                    ->setLastName("Van Laeken")
                    ->setPicture("https://photosdestars.com/ressources/img/uploads/Ang%C3%A8le_Van%20Laeken/Angele_Van%20Laeken_portrait-visage-shooting_1559343335.png")
                    ->setGender(2)
                    ->setRole("Singer");

        $bigflo     = new Artist();
        $bigflo     ->setStageName("Bigflo")
                    ->setFirstName("Florian")
                    ->setLastName("Ordonez")
                    ->setPicture("https://anniversaire-celebrite.com/upload/250x333/bigflo-250.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $oli        = new Artist();
        $oli        ->setStageName("Oli")
                    ->setFirstName("Olivio")
                    ->setLastName("Ordonez")
                    ->setPicture("https://static1.purepeople.com/articles/3/27/73/63/@/3915316-olivio-ordonez-oli-du-groupe-de-rap-bi-950x0-2.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $barbara    = new Artist();
        $barbara    ->setStageName("Barbara Pravi")
                    ->setFirstName("Barbara")
                    ->setLastName("Piévic")
                    ->setPicture("https://prmeng.rosselcdn.net/sites/default/files/dpistyles_v2/ena_16_9_extra_big/2021/02/08/node_163481/38326615/public/2021/02/08/B9726047101Z.1_20210208101505_000%2BG3THHIBH0.2-0.jpg?itok=ks3zsEMv1612866458")
                    ->setGender(2)
                    ->setRole("Singer");

        $hoshi      = new Artist();
        $hoshi      ->setStageName("Hoshi")
                    ->setFirstName("Mathilde")
                    ->setLastName("Gerner")
                    ->setPicture("https://image-api.nrj.fr/medias/2018/10/photo-cover-album_5bb1dae7ac86a.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $benMazue   = new Artist();
        $benMazue   ->setStageName("Ben Mazué")
                    ->setFirstName("Benjamin")
                    ->setLastName("Mazuet")
                    ->setPicture("https://i.f1g.fr/media/madame/1900x1900_crop/sites/default/files/img/2017/09/ben-mazue.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $maelle     = new Artist();
        $maelle     ->setStageName("Maëlle")
                    ->setFirstName("Maëlle")
                    ->setLastName("Pistoia")
                    ->setPicture("http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcQzTd-NDSSVzpuReZIkqDWEGVKC1Gt7a4FyFhWEYa1J3Vbr-0tQNQTbLoUwrUSA")
                    ->setGender(2)
                    ->setRole("Singer");

        $suzane     = new Artist();
        $suzane     ->setStageName("Suzanne")
                    ->setFirstName("Océane")
                    ->setLastName("Colom")
                    ->setPicture("https://www.lillelanuit.com/wp-content/uploads/2019/02/suzane.png")
                    ->setGender(2)
                    ->setRole("Singer");

        $gcm        = new Artist();
        $gcm        ->setStageName("Grand Corps Malade")
                    ->setFirstName("Fabien")
                    ->setLastName("Marsaud")
                    ->setPicture("https://media.resources.festicket.com/www/artists/GrandCorpsMalade.jpg")
                    ->setGender(1)
                    ->setRole("Singer");

        $louane     = new Artist();
        $louane     ->setStageName("Louane")
                    ->setFirstName("Anne")
                    ->setLastName("Peichert")
                    ->setPicture("https://i.skyrock.net/9839/92339839/pics/3249161406_1_3_bnNAuljr.jpg")
                    ->setGender(2)
                    ->setRole("Singer");

        $manager->persist($pomme);
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
    }
}
