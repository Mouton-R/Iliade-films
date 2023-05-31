<?php

namespace App\Controller;

use App\Entity\Formats;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/formats', name: 'formats_')]
class FormatsController extends AbstractController
{
    #[Route('/{slug}', name: 'list')]
    public function list(Formats $format): Response
    {
        $films = $format->getFilms();

        return $this->render('formats/list.html.twig', compact('format', 'films'));
    }

    #[Route("/court-metrages", name: "court-metrages")]
    public function court()
    {
        return $this->render('formats/court-metrages.html.twig');
    }

    #[Route("/long-metrages", name: "long-metrages")]
    public function long()
    {
        return $this->render('formats/long-metrages.html.twig');
    }
}
