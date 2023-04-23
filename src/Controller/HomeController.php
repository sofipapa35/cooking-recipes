<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     * @Route("/home", name="home")
     */
    public function index(CategorieRepository $categorieRepository, RecetteRepository $recetteRepository): Response
    {
        $cat = $categorieRepository->findAll();
        // $rec = $recetteRepository->findAll();
        $rec_recent = $recetteRepository->getRecetteRecent();
        $rec_note = $recetteRepository->getRecetteNotation();
        return $this->render('home/index.html.twig', [
            'categories' => $cat,
            'recettes' => $rec_recent,
            'rec_note' => $rec_note,
        ]);
    }
}
