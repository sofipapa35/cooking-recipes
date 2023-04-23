<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use App\Repository\CategorieRepository;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecetteController extends AbstractController
{
    /**
     * @Route("/recettes", name="recette")
     */
    public function index(RecetteRepository $recetteRepository): Response
    {
        $rec = $recetteRepository->findBy([], ['createdAt' => 'DESC']);
        return $this->render('recette/all.html.twig', [
            'rec' => $rec,
        ]);
    }

    /**
     * @Route("/recette-detail/{id}", name="recette_detail")
     */
    public function recette_detail(RecetteRepository $recetteRepository, string $id): Response
    {
        $rec_detail = $recetteRepository->findById($id);
        // dd($rec_detail);
        return $this->render('recette/recette-detail.html.twig', [
            'rec_detail' => $rec_detail,
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="categorie")
     */
    public function categorie(CategorieRepository $categorieRepository, string $id): Response
    {
        $cat = $categorieRepository->findById($id);
        return $this->render('recette/categorie.html.twig', [
            'cat' => $cat,
        ]);
    }

    /**
     * @Route("/ingredient/{id}", name="ingredient")
     */
    public function ingredient(IngredientRepository $ingredientRepository, string $id): Response
    {
        $ing = $ingredientRepository->findById($id);
        return $this->render('recette/ingrendient.html.twig', [
            'ing' => $ing,
        ]);
    }

    /**
     * @Route("/getRecette", methods={"POST"})
     */
    public function getRecette(Request $request, RecetteRepository $recetteRepository)
    {
        $s = $request->request->get("letter");
        $rec = $recetteRepository->searchRec($s);
        if (!$rec) {
            $res = "La recette n'existe pas";
        } else {
            $res = "";
            foreach ($rec as $r) {
                $res .= '<div class="col-md-2"><a href="/recette-detail/' . $r->getId() . '">
            <div class="card m-1 h-100">
                <div class="slide-note">
                    <img src="img/recettes/' . $r->getImageName() . '" class="card-img-top" alt="' . $r->getTitre() . '">
                    <div class="card-body">
                        <h5 class="card-text text-center">' . $r->getTitre() . '</h5>
                    </div>
                </div>
            </div>
        </a>
        </div>';
            }
        }
        // dd($res);
        return new Response($res);
    }
    
    /**
     * @Route("/rate-star", methods={"POST"})
     */
    public function rateStar(Request $request, RecetteRepository $recetteRepository, EntityManagerInterface $entityManager)
    {
        $note = $request->request->get("note");
        $sId = $request->request->get("rec");
        $recette = $recetteRepository -> getOldNote($sId);
        // dd($recette[0]->getNotation());
        $old_note = $recette[0]->getNotation();
        $old_note_number = $recette[0]->getNoteNumber();
        // dd('old-notation= ' . $old_note, 'old-note-number= ' . $old_note_number, 'note= ' . $note);
        $new_note_number = $old_note_number + 1;
        $new_note = $old_note + $note;
        // dd('new-notation= ' . $new_note, 'new-note-number= ' . $new_note_number);
        $recette[0] -> setNotation($new_note);
        $recette[0] -> setNoteNumber($new_note_number);
        $recette[0] -> addUserNote($this->getUser());
        
        $entityManager->persist($recette[0]);
        $entityManager->flush();
        
        $message = '<h5 class=\'text-center\'>Merci pour votre vote</h5>';
        return new Response($message);
    }
}
