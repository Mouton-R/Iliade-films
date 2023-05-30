<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\FilmsFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/films', name: 'films_')]
class FilmsController extends AbstractController
{
    #[Route('/{slug}', name: 'details_')]
    public function details(Films $film): Response
    {
        return $this->render(
            'films/details.html.twig',
            compact('film')
        );
    }
}
