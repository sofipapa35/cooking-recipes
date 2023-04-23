<?php

namespace App\DataFixtures;

use App\Entity\Image;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ImageFixtures extends Fixture
{
     // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const IMG_1 = "img_1";
    public const IMG_2 = "img_2";
    public const IMG_3 = "img_3";
    public const IMG_4 = "img_4";

    public function load(ObjectManager $manager): void
    {
        $img = new Image();
        $img -> setImageName('quiche1.png');
        $img -> setTitre('quiche');
        $img->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($img);
        $this->addReference(self::IMG_1, $img);

        $img = new Image();
        $img -> setImageName('quiche2.png');
        $img -> setTitre('quiche');
        $img->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($img);
        $this->addReference(self::IMG_2, $img);

        $img = new Image();
        $img -> setImageName('soufle1.png');
        $img -> setTitre('soufle');
        $img->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($img);
        $this->addReference(self::IMG_3, $img);

        $img = new Image();
        $img -> setImageName('soupe.png');
        $img -> setTitre('soupe');
        $img->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($img);
        $this->addReference(self::IMG_4, $img);

        $manager->flush();
    }
}
