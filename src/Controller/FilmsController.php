<?php

namespace App\Controller;

use App\Entity\Films;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/films', name: 'films_')]
class FilmsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('films/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Films $film): Response
    {
        return $this->render('films/details.html.twig', compact('film'));
    }
}
