<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Repository\InscriptionRepository;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, InscriptionRepository $repo): Response
    {

        $ins = new Inscription();

        $form = $this->createForm(InscriptionType::class, $ins);
        $form->handleRequest($request);
       
        // if($form->isSubmitted() && $form->isValid()){
            
        //         $repo->add($form->getData(), true);
        //         return $this->redirectToRoute('aa_etudiant');
        // }
       
        return $this->render('inscription/form.html.twig', [
            'form' => $form ->createView()
        ]);
        
        // return $this->render('inscription/index.html.twig', [
        //     'controller_name' => 'InscriptionController',
        // ]);
    }
    
}
