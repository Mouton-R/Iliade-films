<?php

namespace App\Controller;

use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    #[Route('/{slug}', name: 'list')]
    public function list(Categories $category): Response
    {
        $films = $category->getFilms();

        return $this->render('categories/list.html.twig', compact('category', 'films'));
    }

    #[Route("/court-metrages", name: "court-metrages")]
    public function court()
    {
        return $this->render('categories/court-metrages.html.twig');
    }

    #[Route("/long-metrages", name: "long-metrages")]
    public function long()
    {
        return $this->render('categories/long-metrages.html.twig');
    }
}
