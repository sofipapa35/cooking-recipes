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
        $recette -> setImageName('soupe.png');
        $recette -> setCal('65');
        $recette -> setHeure('40');
        $recette -> setQnt('4');
        $recette -> setListe('>4 oignons>50g de beurre>1 c.à.s d\'huile>1 l d\eau>6 tranches de pain de mie>100 g de compté râpé>sel>poivre>25 cl de vin blanc');
        $recette -> setEtapes('>Pelez et émincez les oignons. >Faites-les revenir dans le mélange beurre et huile jusqu\'à ce qu\'ils soient tendres et légèrement dorés. >Saupoudrez le mélange de farine, mouillez d\'eau chaude et de vin blanc et assaisonnez.>Couvrez et laissez bouillonner doucement pendant 20 minutes.>Faites grillez le pain.>Disposez chaque tranche dans le fond de 4 petits bols individuels supportant le passage au four.>Saupoudrez d\'un peu de fromage râpé. Versez la soupe par-dessus.>Saupoudrez à nouveau de fromage et faites gratiner.');
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-17"));
        $manager->persist($recette);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_SOUPES));
        $recette->addImage($this->getReference(ImageFixtures::IMG_4));
        
        $recette = new Recette();
        $recette -> setTitre('Quiche aux poireaux');
        $recette -> setImageName('quiche1.png');
        $recette -> setCal('100');
        $recette -> setHeure('70');
        $recette -> setQnt('4');
        $recette -> setListe('1 pâte brisée ou feuilletée>250 g de poireau>25 cl de crème fraîche>50 g de beurre>20 cl de lait>4 oeufs>sel>poivre>muscade>chapelure');
        $recette -> setEtapes('Lavez et coupez les blancs de poireaux en tronçons. >Faites-les cuire dans une sauteuse couverte avec le beurre>et un peu d\'eau environ 20 minutes.>Une fois cuits, travaillez-les en purée à la fourchette.>Etalez la pâte dans un moule, piquez-la à la fourchette.>Saupoudrez de chapelure et étalez la purée de poireaux.>Battez les oeufs avec la crème et le lait, sel, poivre et une pincée de muscade.>Versez sur les poireaux et saupoudrez de chapelure.>Faites cuire 40 min au four préchauffé à 220°C (thermostat 7-8).');
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-16"));
        $recette->setNotation(4.3);
        $manager->persist($recette); 
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_PLATS));
        $recette->addImage($this->getReference(ImageFixtures::IMG_1));
        $recette->addImage($this->getReference(ImageFixtures::IMG_2));
        
        $recette = new Recette();
        $recette -> setTitre('Soufflé au fromage');
        $recette -> setImageName('soufle1.png');
        $recette -> setCal('150');
        $recette -> setHeure('70');
        $recette -> setQnt('4');
        $recette -> setListe('150 g d\'emmental ou gruyère râpé>60 g de beurre>60 g de farine>4 oeufs ou 5 moyens>40 cl de lait>muscade');
        $recette -> setEtapes('Préchauffer le four à 180°C (thermostat 6). Beurrer le moule.>Chauffer le beurre dans une casserole, ajouter la farine et remuer rapidement pendant 1 min. Ajouter le lait tiédi, remuer au fouet pendant quelques minutes à feu doux.>Retirer la casserole du feu.>Séparer les blancs et les battre fermement (avec une pincée de sel).>Dans la casserole refroidie, ajouter les jaunes d\'oeufs un à un, puis le fromage râpé. Mettre une pincée de muscade, poivrer. Saler peu car le fromage contient déjà du sel.>Incorporer les blancs d\'oeufs battus en mélangeant délicatement.>Verser dans le moule, au maximum jusqu\'à 4 cm du bord.>Enfourner pendant 35 minutes en position chaleur tournante.');
        $recette->setUpdatedAt(new DateTimeImmutable);
        $recette->setCreatedAt(new DateTimeImmutable("2023-04-11"));
        $recette->setNotation(4);
        $recette->addCategory($this->getReference(CategorieFixtures::CATEGORY_PLATS));
        $recette->addImage($this->getReference(ImageFixtures::IMG_3));
        $manager->persist($recette);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CategorieFixtures::class,
        ];
    }
}
