<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/recette")
 */
class AdminRecetteController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_recette_index", methods={"GET"})
     */
    public function index(RecetteRepository $recetteRepository): Response
    {
        return $this->render('admin_recette/index.html.twig', [
            'recettes' => $recetteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_recette_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RecetteRepository $recetteRepository): Response
    {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recette -> setCreatedAt(new DateTimeImmutable());
            $recette -> setUpdatedAt(new DateTimeImmutable());
            $recetteRepository->add($recette, true);

            return $this->redirectToRoute('app_admin_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_recette/new.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_recette_show", methods={"GET"})
     */
    public function show(Recette $recette): Response
    {
        return $this->render('admin_recette/show.html.twig', [
            'recette' => $recette,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_recette_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Recette $recette, RecetteRepository $recetteRepository): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {            
            $recette -> setUpdatedAt(new DateTimeImmutable());
            $recetteRepository->add($recette, true);

            return $this->redirectToRoute('app_admin_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_recette/edit.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_recette_delete", methods={"POST"})
     */
    public function delete(Request $request, Recette $recette, RecetteRepository $recetteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recette->getId(), $request->request->get('_token'))) {
            $recetteRepository->remove($recette, true);
        }

        return $this->redirectToRoute('app_admin_recette_index', [], Response::HTTP_SEE_OTHER);
    }
}
