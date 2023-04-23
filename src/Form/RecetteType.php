<?php

namespace App\Form;

use App\Entity\Recette;
use App\Entity\Categorie;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ['label'=> "Titre*"])
            ->add('heure', TextType::class, ['label'=> "Temps de préparation", 'required' => false])
            ->add('qnt', TextType::class, ['label'=> "Morceaux", 'required' => false])
            ->add('cal', TextType::class, ['label'=> "Calories", 'required' => false])
            ->add('liste', CKEditorType::class, ['label'=> "Liste d'ingredients", 'required' => false,
            'help' => 'écrivez les ingrédients dans une liste les uns en dessous des autres'])
            ->add('etapes', CKEditorType::class, ['label'=> "Etapes", 'required' => false,
            // 'placeholder' => 'lavez la salade
            // coupez les pommes de terre
            // etc',
            'help' => 'écrivez les atapes dans une liste les uns en dessous des autres'])
            ->add('imageFile', FileType::class, ['label'=>'Image', 'required' => false])
            ->add('ingredients', EntityType::class, [
                'class' => Ingredient::class,'label'=> "Ingredients", "multiple" => true, 'required' => false])
            ->add('categories', EntityType::class, [
                'class' => Categorie::class,'label'=> "Categories", "multiple" => true, 'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
