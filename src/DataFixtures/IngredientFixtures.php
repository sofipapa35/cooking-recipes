<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class IngredientFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const ING_OEUFS = "ing-oeufs";
    public const ING_LAIT = "ing-lait";
    public const ING_TOMATES = "ing-tomates";
    public const ING_FRAISES = "ing-fraises";

    public function load(ObjectManager $manager): void
    {
        $ingredient = new Ingredient();
        $ingredient -> setTitre('oeufs');
        $ingredient -> setImageName('oeufs-64414ba558ff0736232566.png');
        $ingredient->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nunc ipsum. Fusce quis ornare eros. Aliquam arcu erat, consectetur eget ornare quis, tincidunt a erat. Proin vulputate, neque commodo maximus luctus, ipsum velit maximus libero, ac finibus ex orci cursus neque. Nulla faucibus porta diam ac lacinia. In ut faucibus lorem. Curabitur in ullamcorper enim.');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($ingredient);
        $this->addReference(self::ING_OEUFS, $ingredient);

        $ingredient = new Ingredient();
        $ingredient -> setTitre('lait');
        $ingredient -> setImageName('telechargement-2-64414b928c89c374935170.jpg');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $ingredient->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nunc ipsum. Fusce quis ornare eros. Aliquam arcu erat, consectetur eget ornare quis, tincidunt a erat. Proin vulputate, neque commodo maximus luctus, ipsum velit maximus libero, ac finibus ex orci cursus neque. Nulla faucibus porta diam ac lacinia. In ut faucibus lorem. Curabitur in ullamcorper enim.');
        $manager->persist($ingredient);
        $this->addReference(self::ING_LAIT, $ingredient);

        $ingredient = new Ingredient();
        $ingredient -> setTitre('tomates');
        $ingredient -> setImageName('tomates.png');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($ingredient);
        $this->addReference(self::ING_TOMATES, $ingredient);

        $ingredient = new Ingredient();
        $ingredient -> setTitre('fraises');
        $ingredient -> setImageName('telechargement-1-64414ca8ef58c948652352.jpg');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($ingredient);
        $this->addReference(self::ING_FRAISES, $ingredient);

        $manager->flush();
    }
}
