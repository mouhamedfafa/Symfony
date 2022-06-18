<?php

namespace App\Controller;

use App\Entity\Professeur;
use App\Form\ProfesseurType;
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
        $request->query->getInt('page',1),
        5
    );
        
        //dd($profs);
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
            'professeur'=>$profs
        ]);
 
        
    }
    #[Route('/add-professeur', name: 'apd_professeur')]
    public function apd(Request $request, ProfesseurRepository $repo)
    {
        $prof = new Professeur();

        $form = $this->createForm(ProfesseurType::class, $prof);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $repo->add($form->getData(), true);
            return $this->redirectToRoute('app_professeur');
    }
        return $this->render('professeur/form.html.twig', [
            'form' => $form ->createView()
        ]);
    }
      

    #[Route('/edit-professeur/{id}', name: 'edd_professeur')]

 public function edit(Request $request,ProfesseurRepository $repo,$id):Response{
    
    $prof=new Professeur;
    
           $prof=$repo->find($id);
          
    
        $form = $this->createForm(ProfesseurType::class, $prof);     
              
    
             $form->handleRequest($request);
       
             if($form->isSubmitted()&& $form->isValid()){
                $repo->add($form->getData(),true);
                return $this->redirectToRoute('app_professeur');
       
            }
    
             return $this->render('professeur/form.html.twig', [
                'form' => $form ->createView() 
                 ]);
    }
    
    #[Route('/prof-detail/{id}',name: 'det_professeur')]

    public function detail(Request $request,ProfesseurRepository $repo,$id):Response{
    // $prof=new Professeur;
         
       $prof = $repo->find($id);
        // dd($dataprof);
    
        return $this->render('professeur/detail.html.twig', [
            'controller_name' => 'ProfesseurController',
            'professeur'=>$prof
        ]);
 

     
       }
}



