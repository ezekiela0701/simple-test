<?php

namespace App\Controller\fo;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('fo/accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
