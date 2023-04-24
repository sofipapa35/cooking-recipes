<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Recette;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecetteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $recette = new Recette();
        $recette -> setTitre('Soupe à l\'oignon');
        $recette -> setImageName('soupe-a-l-oignon.jpeg');
        $recette -> setCal('65');
        $recette -> setHeure('40');
        $recette -> setQnt('4');
        $recette -> setNotation(20);
        $recette -> setNoteNumber(4);
        $recette -> setListe("4 oignons\r\n\r\n50g de beurre\r\n\r\n1 c.à.s d'huile1\r\n\r\n1l d'eau\r\n\r\n6 tranches de pain de mie\r\n\r\n100 g de compté râpé\r\n\r\nsel\r\n\r\npoivre\r\n\r\n25 cl de vin blanc");
        $recette -> setEtapes("Pelez et émincez les oignons.\r\n\r\n
        Faites-les revenir dans le mélange beurre et huile jusqu\'à ce qu'ils soient tendres et légèrement dorés.\r\n\r\n
        Saupoudrez le mélange de farine, mouillez d'eau chaude et de vin blanc et assaisonnez.\r\n\r\n
        Couvrez et laissez bouillonner doucement pendant 20 minutes.\r\n\r\n
        Faites grillez le pain.\r\n\r\n
        Disposez chaque tranche dans le fond de 4 petits bols individuels supportant le passage au four.\r\n\r\n
        Saupoudrez d'un peu de fromage râpé. Versez la soupe par-dessus.\r\n\r\n
        Saupoudrez à nouveau de fromage et faites gratiner.");
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-17"));
        $manager->persist($recette);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_APERITIF));
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_PLATS));
        
        $recette = new Recette();
        $recette -> setTitre('Quiche aux poireaux');
        $recette -> setImageName('i22038-quiche-poireaux-lardons-644151e1e960d608729329.jpg');
        $recette -> setCal('100');
        $recette -> setHeure('70');
        $recette -> setQnt('4');
        $recette -> setNotation(8);
        $recette -> setNoteNumber(3);
        $recette -> setListe("1 pâte brisée ou feuilletée\r\n\r\n
        250 g de poireau\r\n\r\n
        25 cl de crème fraîche\r\n\r\n
        50 g de beurre\r\n\r\n
        20 cl de lait\r\n\r\n
        4 oeufs\r\n\r\n
        sel\r\n\r\n
        poivre\r\n\r\n
        muscade\r\n\r\n
        chapelure");
        $recette -> setEtapes("Lavez et coupez les blancs de poireaux en tronçons. \r\n\r\n
        Faites-les cuire dans une sauteuse couverte avec le beurre\r\n\r\n
        et un peu d'eau environ 20 minutes.\r\n\r\n
        Une fois cuits, travaillez-les en purée à la fourchette.\r\n\r\n
        Etalez la pâte dans un moule, piquez-la à la fourchette.\r\n\r\n
        Saupoudrez de chapelure et étalez la purée de poireaux.\r\n\r\n
        Battez les oeufs avec la crème et le lait, sel, poivre et une pincée de muscade.\r\n\r\n
        Versez sur les poireaux et saupoudrez de chapelure.\r\n\r\n
        Faites cuire 40 min au four préchauffé à 220°C (thermostat 7-8).");
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-16"));
        $manager->persist($recette); 
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_PLATS));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_LAIT));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_OEUFS));
        
        $recette = new Recette();
        $recette -> setTitre('Soufflé au fromage');
        $recette -> setImageName('SoufflEaufromage.jpg');
        $recette -> setCal('150');
        $recette -> setHeure('70');
        $recette -> setQnt('4');
        $recette -> setNotation(22);
        $recette -> setNoteNumber(5);
        $recette -> setListe("150 g d'emmental ou gruyère râpé\r\n\r\n
        60 g de beurre\r\n\r\n
        60 g de farine\r\n\r\n
        4 oeufs ou 5 moyens\r\n\r\n
        40 cl de lait\r\n\r\n
        muscade");
        $recette -> setEtapes("Préchauffer le four à 180°C (thermostat 6). Beurrer le moule.\r\n\r\n
        Chauffer le beurre dans une casserole, ajouter la farine et remuer rapidement pendant 1 min. Ajouter le lait tiédi, remuer au fouet pendant quelques minutes à feu doux.\r\n\r\n
        Retirer la casserole du feu.\r\n\r\n
        Séparer les blancs et les battre fermement (avec une pincée de sel).\r\n\r\n
        Dans la casserole refroidie, ajouter les jaunes d'oeufs un à un, puis le fromage râpé. Mettre une pincée de muscade, poivrer. Saler peu car le fromage contient déjà du sel.\r\n\r\n
        Incorporer les blancs d'oeufs battus en mélangeant délicatement.>Verser dans le moule, au maximum jusqu'à 4 cm du bord.\r\n\r\n
        Enfourner pendant 35 minutes en position chaleur tournante.");
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-11"));
        $manager->persist($recette);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_PLATS));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_OEUFS));

        $recette = new Recette();
        $recette -> setTitre('Smoothie aux fruits');
        $recette -> setImageName('63305-w768h1024c1cx192cy256-64414d3413f73124257782.png');
        $recette -> setCal('70');
        $recette -> setHeure('10');
        $recette -> setQnt('4');
        $recette -> setNotation(23);
        $recette -> setNoteNumber(5);
        $recette -> setListe("140 g (1 tasse) de fruits surgelés variés au goût (fraises, mangue, framboises, etc.) ou 1 banane\r\n\r\n
        125 ml (1/2 tasse) de lait\r\n\r\n
        125 ml (1/2 tasse) de yogourt nature\r\n\r\n
        15 ml (1 c. à soupe) de miel ou de sucre");
        $recette -> setEtapes('dans le contenant d’un mélangeur à main (haut contenant cylindrique), réduire tous les ingrédients en purée lisse. verser le smoothie dans un grand verre.');
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-18"));
        $manager->persist($recette);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_DESSERT));
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_BOISSONS));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_FRAISES));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_LAIT));

        $recette = new Recette();
        $recette -> setTitre('Pizza');
        $recette -> setImageName('992x1340-9161-64414db2e6f55182654492.jpg');
        $recette -> setCal('120');
        $recette -> setHeure('30');
        $recette -> setQnt('8');
        $recette -> setNotation(10);
        $recette -> setNoteNumber(3);
        $recette -> setListe("1 pâte à pizza\r\n\r\n
        1barquette de lardons\r\n\r\n
        1 boîte de champignons\r\n\r\n
        1 boîte de tomate\r\n\r\n
        1/2 verre d\'eau\r\n\r\n
        sel\r\n\r\n
        poivre");
        $recette -> setEtapes("Faire cuire dans une poêle les lardons et les champignons. \r\n\r\n      
        Dans un bol, verser la boîte de concentré de tomate, y ajouter un demi verre d'eau, ensuite mettre un carré de sucre (pour enlever l'acidité de la tomate) une pincée de sel, de poivre, et une pincée d'herbe de Provence.\r\n\r\n
        Dérouler la pâte à pizza sur le lèche frite de votre four, piquer-le \r\n\r\n
        Avec une cuillère à soupe, étaler délicatement la sauce tomate, ensuite y ajouter les lardons et les champignons bien dorer. Parsemer de fromage râpée. \r\n\r\n       
        Mettre au four à 220°, thermostat 7-8, pendant 20 min (ou lorsque le dessus de la pizza est doré).");
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-18"));
        $manager->persist($recette);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_DESSERT));
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_BOISSONS));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_FRAISES));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_LAIT));
        
        $recette = new Recette();
        $recette -> setTitre('Roulé à la fraise');
        $recette -> setImageName('gateaufraises.jpg');
        $recette -> setCal('100');
        $recette -> setHeure('40');
        $recette -> setQnt('8');
        $recette -> setNotation(10);
        $recette -> setNoteNumber(3);
        $recette -> setListe("120 g de farine\r\n\r\n120 g de sucre\r\n\r\n4 oeufs\r\n\r\nconfiture de fraise\r\n\r\nvermicelle au chocolat blanc");
        $recette -> setEtapes("Pour la génoise, battre 4 jaunes d'oeuf et 120 g de sucre jusqu'à ce que le mélange blanchisse. Battre 4 blancs en neige. Mélanger 120 g de farine et une pincée de sel avec le mélange aux oeufs. Ajouter délicatement les blancs en neige. Préchauffer votre four à 180°c, thermostat 6. Sur la plaque du four, étaler une feuille de papier sulfurisé beurrée. Étaler la génoise sur la plaque. Faire cuire 12 minutes. Faire refroidir sur un torchon humide (avec le papier sulfurisé). Étaler une couche de confiture à la fraise.\r\n\r\nRouler le gâteau délicatement. Envelopper dans du papier d'aluminium et laisser refroidir au réfrigérateur. Couper les extrémités. Décorer avec de la confiture et des vermicelles au chocolat blanc.");
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-20"));
        $manager->persist($recette);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_DESSERT));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_FRAISES));
        $recette->addIngredient($this->getReference(IngredientFixtures::ING_OEUFS));

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CategorieFixtures::class,
            IngredientFixtures::class,
        ];
    }
}
