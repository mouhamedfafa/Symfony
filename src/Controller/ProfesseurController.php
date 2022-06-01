<?php

namespace App\Controller;

use App\Entity\Professeur;
use App\Repository\ProfesseurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{ 
    
    #[Route('/professeur', name: 'app_professeur')]
    
    public function index(ProfesseurRepository $repos,Request $request, PaginatorInterface $paginator): Response
    {
        $data=$repos->findAll();
        $profs=$paginator->paginate($data,
        $request->query->getInt('page', 1),
        5
    );
        
        //dd($profs);
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
            'professeur'=>$profs
        ]);
 
      
        
    }
}
