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
    public const CATEGORY_DESSERT = "category_dessert";
    public const CATEGORY_BOISSONS = "category_boissons";

    public function load(ObjectManager $manager): void
    {
        $cat = new Categorie();
        $cat->setTitre('desserts');
        $cat->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nunc ipsum. Fusce quis ornare eros. Aliquam arcu erat, consectetur eget ornare quis, tincidunt a erat. Proin vulputate, neque commodo maximus luctus, ipsum velit maximus libero, ac finibus ex orci cursus neque. Nulla faucibus porta diam ac lacinia. In ut faucibus lorem. Curabitur in ullamcorper enim.');
        $cat->setImageName('images-644149b52017a403585004.png');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_DESSERT, $cat);
        
        $cat = new Categorie();
        $cat->setTitre('boissons');
        $cat->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nunc ipsum. Fusce quis ornare eros. Aliquam arcu erat, consectetur eget ornare quis, tincidunt a erat. Proin vulputate, neque commodo maximus luctus, ipsum velit maximus libero, ac finibus ex orci cursus neque. Nulla faucibus porta diam ac lacinia. In ut faucibus lorem. Curabitur in ullamcorper enim.');
        $cat->setImageName('3144974-64414b128c3cb113924307.png');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_BOISSONS, $cat);
        
        $cat = new Categorie();
        $cat->setTitre('apéritifs');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $cat->setImageName('1691762-64414b28c5237762389242.png');
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_APERITIF, $cat);
        
        $cat = new Categorie();
        $cat->setTitre('plats');
        $cat->setUpdatedAt(new DateTimeImmutable());
        $cat->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nunc ipsum. Fusce quis ornare eros. Aliquam arcu erat, consectetur eget ornare quis, tincidunt a erat. Proin vulputate, neque commodo maximus luctus, ipsum velit maximus libero, ac finibus ex orci cursus neque. Nulla faucibus porta diam ac lacinia. In ut faucibus lorem. Curabitur in ullamcorper enim.');
        $cat->setImageName('images-644149b52017a403585004.png');
        $cat->setImageName('1046874-64414b063123b044167704.png');
        $manager->persist($cat);
        $this->addReference(self::CATEGORY_PLATS, $cat);

        $manager->flush();
    }
}
