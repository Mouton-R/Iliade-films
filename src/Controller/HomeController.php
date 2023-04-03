<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
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