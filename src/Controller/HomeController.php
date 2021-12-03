<?php

namespace App\Controller;

use App\Repository\MaisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(MaisonRepository $maisonRepository): Response
    {
        $maisons = $maisonRepository->findBy([], ['id' => 'DESC'], 6);
        return $this->render('home/index.html.twig', [
            'maisons' => $maisons,
        ]);
    }
}
