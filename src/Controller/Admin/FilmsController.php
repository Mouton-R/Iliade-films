<?php

namespace App\Controller\Admin;

use App\Entity\Films;
use App\Entity\Images;
use App\Form\FilmsFormType;
use App\Service\PictureService;
use App\Repository\FilmsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\component\HttpFoundation\JsonResponse;
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
    public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger, PictureService $pictureService): Response
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
            //On récupère les images
            $images = $filmForm->get('images')->getData();

            foreach ($images as $image) {
                //on définit le dossier de destination
                $folder = 'products';

                //On appelle le service d'ajout
                $fichier = $pictureService->add($image, $folder, 350, 500);

                $img = new Images();
                $img->setName($fichier);
                $film->addImage($img);
            }

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

    #[Route('/suppression/{slug}', name: 'delete')]
    public function delete(Films $film): Response
    {
        // On vérifie si l'utilisateur peut supprimer avec le Voter
        // $this->denyAccessUnlessGranted('PRODUCT_DELETE', $film);

        // suppression a faire
        return $this->render('admin/products/edit.html.twig');
    }

    #[Route('/suppression/image/{id}', name: 'delete_image', methods: ['DELETE'])]
    public function deleteImage(Images $image, Request $request, EntityManagerInterface $em, PictureService $pictureService): JsonResponse
    {
        // On récupère le contenu de la requête
        $data = json_decode($request->getContent(), true);

        if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {
            // Le token csrf est valide
            // On récupère le nom de l'image
            $nom = $image->getName();

            if ($pictureService->delete($nom, 'films', 300, 300)) {
                // On supprime l'image de la base de données
                $em->remove($image);
                $em->flush();

                return new JsonResponse(['success' => true], 200);
            }
            // La suppression a échoué
            return new JsonResponse(['error' => 'Erreur de suppression'], 400);
        }

        return new JsonResponse(['error' => 'Token invalide'], 400);
    }
}
