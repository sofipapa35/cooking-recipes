<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class IngredientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ingredient = new Ingredient();
        $ingredient -> setTitre('oeufs');
        $ingredient -> setImageName('oeufs.png');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($ingredient);

        $ingredient = new Ingredient();
        $ingredient -> setTitre('lait');
        $ingredient -> setImageName('lait.png');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($ingredient);

        $ingredient = new Ingredient();
        $ingredient -> setTitre('tomates');
        $ingredient -> setImageName('tomates.png');
        $ingredient->setUpdatedAt(new DateTimeImmutable());
        $manager->persist($ingredient);

        $manager->flush();
    }
}
