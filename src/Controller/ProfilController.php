<?php

namespace App\Controller;

use App\Form\ProfilType;
use App\Repository\RecetteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        // On récupère le user actif dans une variable $user, le user de l'application se récupère directement 
        // avec la méthode getUSer()
        $user = $this->getUser();
        // On crée un formulaire dédié à ce que peut changer de l'utilisateur
        $form = $this->createForm(ProfilType::class, $user);
        // On hydrate (mettre des données dedans ) le formulaire avec les données POST se trouvant potentiellement dans la requête
        $form->handleRequest($request);
        // Si il y a eu hydratation alors on verifie si le formulaire est soumis et valide
        // Alors on en traite les données et on flush (on met à jour la bdd)
        if ($form->isSubmitted() && $form->isValid()) {
            // On met à jour le mot de passe encodé de l'utilisateur s'il en a saisi un nouveau
            $plainPassword = $form->get('plainPassword')->getData();
            if (!is_null($plainPassword)) {
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $plainPassword
                    )
                );
            }
            $entityManager->persist($user);
            $entityManager->flush();
            // On ajoute un message de confirmation géré en session automatiquement par Symfony
            $this->addFlash("success", "Vos informations ont bien été mises à jour.");
            // On redirige vers la même page
            $this->redirectToRoute('profil');
        }
        // Rendu
        return $this->render('profil/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/user/addrecette", name="addrecette", methods={"POST", "GET"})
     */
    public function addBook(Request $request, RecetteRepository $recetteRepository, EntityManagerInterface $entityManager): Response
    {
        // On ajoute le bouquin à la liste de l'utilisateur
        // 1 on récupère le livre par son id
        $rec = $recetteRepository->find($request->request->get("id"));
        $user = $this->getUser();
        $user->addRecette($rec);
        $entityManager->persist($rec);
        $entityManager->flush();
        //
        return new Response("ok");
    }

     /**
     * @Route("/user/removerecette/{id}", name="remove-recette")
     */
    public function removeBook(int $id, RecetteRepository $recetteRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $rec = $recetteRepository->find($id);
        $user = $this->getUser();
        $user->removeRecette($rec);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute("profil");
    }
}
