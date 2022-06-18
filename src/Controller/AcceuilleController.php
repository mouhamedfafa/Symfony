<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilleController extends AbstractController
{
    #[Route('/acceuille', name:'app_acceuille')]
    public function index(): Response
    {
        return $this->render('acceuille/index.html.twig', [
            'controller_name' => 'AcceuilleController',
        ]);
    }
}
