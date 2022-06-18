<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'aa_etudiant')]
    public function index(EtudiantRepository $repos,Request $request, PaginatorInterface $paginator): Response
    {
        $data=$repos->findAll();
        $etu=$paginator->paginate($data,
        $request->query->getInt('page', 1),
        5);
    
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
            'etudiant'=>$etu
        ]); 
    }

    #[Route('/add-etudiant',name:'apd_etudiant')]
    public function app(Request $request, EtudiantRepository $repo)
    {
        $etu = new Etudiant();

        $form = $this->createForm(EtudiantType::class, $etu);
        $form->handleRequest($request);
        // dd($form);   
        if($form->isSubmitted() && $form->isValid()){
            
                $repo->add($form->getData(), true);
                return $this->redirectToRoute('aa_etudiant');
        }
       
        return $this->render('etudiant/form.html.twig', [
            'form' => $form ->createView()
        ]);
    }


    #[Route('/edit-etudiant/{id}',name:'edd_etudiant')]

    public function edit(Request $request,EtudiantRepository $repo,$id):Response{
    
        $prof=new Etudiant;
        
               $prof=$repo->find($id);
              
        
            $form = $this->createForm(EtudiantType::class, $prof);     
                  
        
                 $form->handleRequest($request);
           
                 if($form->isSubmitted()&& $form->isValid()){
                    $repo->add($form->getData(),true);
                    return $this->redirectToRoute('aa_etudiant');
           
                }
        
                 return $this->render('etudiant/form.html.twig', [
                    'form' => $form ->createView() 
                     ]);
        }

   
}
