<?php

namespace App\Controller;

use App\Repository\AcRepository;    
use Knp\Component\Pager\PaginatorInterface;
use App\Form\AcType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Ac;

class AcController extends AbstractController
{
    #[Route('/ac', name: 'app_ac')]
    public function index(AcRepository $repos, Request $request, PaginatorInterface $paginator): Response
    
    {

        $data=$repos->findAll();
        $acs=$paginator->paginate($data,
        $request->query->getInt('page', 1),
        5
    );

        return $this->render('ac/index.html.twig', [
            'controller_name' => 'AcController',
            'ac' =>$acs
        ]);
    }
    #[Route("/edit-ac/{id}", name:"edd_ac")]
    public function edit(Request $request,AcRepository $repo,$id):Response{
      
   $cl=new Ac;
   
          $cl=$repo->find($id);
         
   
       $form = $this->createForm(AcType::class, $cl);     
       
            $form->handleRequest($request);
      
            if($form->isSubmitted()&& $form->isValid()){
               $repo->add($form->getData(),true);
               return $this->redirectToRoute('app_ac');
      
           }
   
            return $this->render('module/form.html.twig', [
               'form' => $form ->createView() 
                ]);
   }
   
   
}
