<?php

namespace App\Controller;

use App\Entity\Films;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
// class HomeController extends AbstractController
// {
//     #[Route('/', name: 'index')]
//     public function home(FormatsRepository $formatsRepository): Response
//     {
//         return $this->render('blog/index.html.twig', [
//             'formats' => $formatsRepository->findBy(
//                 [],
//                 ['formatsOrder' => 'asc']
//             )
//         ]);
//     }
// }