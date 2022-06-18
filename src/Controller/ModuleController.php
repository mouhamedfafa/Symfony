<?php

namespace App\Controller;
use App\Entity\Module;
use App\Form\ModuleType;
use App\Repository\ModuleRepository;
use Knp\Component\Pager\PaginatorInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModuleController extends AbstractController
{
    #[Route('/module', name: 'app_module')]
    public function index(ModuleRepository $repos, Request $request, PaginatorInterface $paginator): Response
    {
        $data=$repos->findAll();
        $mod=$paginator->paginate($data,
        $request->query->getInt('page', 1),
        5);
        return $this->render('module/index.html.twig', [
            'controller_name' => 'ModuleController',
            'module'=>$mod
        ]);
        
    }

    #[Route("/edit-module/{id}", name:"edd_module")]
 public function edit(Request $request,ModuleRepository $repo,$id):Response{
    
$cl=new Module;

       $cl=$repo->find($id);
      

    $form = $this->createForm(ModuleType::class, $cl);     
          

         $form->handleRequest($request);
   
         if($form->isSubmitted()&& $form->isValid()){
            $repo->add($form->getData(),true);
            return $this->redirectToRoute('app_module');
   
        }

         return $this->render('module/form.html.twig', [
            'form' => $form ->createView() 
             ]);
}



}
