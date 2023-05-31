<?php

namespace App\Controller;


use App\Repository\FormatsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(FormatsRepository $formatsRepository): Response
    {
        return $this->render('blog/home.html.twig', [
            'formats' => $formatsRepository->findBy(
                [],
                ['formatOrder' => 'asc']
            )
        ]);
    }

    #[Route("/blog/info", name: "blog_info")]
    public function info()
    {
        return $this->render('blog/info.html.twig');
    }
}
