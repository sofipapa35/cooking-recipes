<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const CATEGORY_APERITIF = "category_aperitif";
    public const CATEGORY_PLATS = "category_plats";
    public const CATEGORY_SOUPES = "category_soupes";

    public function load(ObjectManager $manager): void
    {
        $cat = new Categorie();
        $cat->setTitre('Soupes');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_SOUPES, $cat);

        $cat = new Categorie();
        $cat->setTitre('apéritif');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_APERITIF, $cat);

        $cat = new Categorie();
        $cat->setTitre('plats');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_PLATS, $cat);

        $manager->flush();
    }
}
