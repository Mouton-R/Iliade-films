<?php

namespace App\Controller\Admin;

use App\Entity\Films;
use App\Form\FilmsFormType;
use App\Repository\FilmsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/admin/films', name: 'admin_films_')]
class FilmsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(FilmsRepository $filmsRepository): Response
    {
        $films = $filmsRepository->findAll();
        return $this->render('admin/films/index.html.twig', compact('films'));
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        // !! a faire !!
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');

        //On crée un nouveau produit
        $film = new Films();

        //On crée le formulaire
        $filmForm = $this->createForm(FilmsFormType::class, $film);

        // On traîte la requête du formulaire
        $filmForm->handleRequest($request);

        // On vérifie sir le formulaire est soumis et valide
        if ($filmForm->isSubmitted() && $filmForm->isValid()) {
            // On génère le slug
            $slug = $slugger->slug($film->getTitre());
            $film->setSlug($slug);

            // On stock
            $em->persist($film);
            $em->flush();

            $this->addFlash('success', 'Production ajoutée');

            // On redirige
            return $this->redirectToRoute('admin_films_index');
        }

        return $this->renderForm('admin/films/add.html.twig', compact('filmForm'));
    }

    #[Route('/edition/{slug}', name: 'edit')]
    public function edit(Films $film, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {

        //On crée le formulaire
        $filmForm = $this->createForm(FilmsFormType::class, $film);

        // On traîte la requête du formulaire
        $filmForm->handleRequest($request);

        // On vérifie sir le formulaire est soumis et valide
        if ($filmForm->isSubmitted() && $filmForm->isValid()) {
            // On génère le slug
            $slug = $slugger->slug($film->getTitre());
            $film->setSlug($slug);

            // On stock
            $em->persist($film);
            $em->flush();

            $this->addFlash('success', 'Production modifiée');

            // On redirige
            return $this->redirectToRoute('admin_films_index');
        }

        return $this->renderForm('admin/films/edit.html.twig', compact('filmForm'));
    }
}
