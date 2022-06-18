<?php

namespace App\Controller;
use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use Doctrine\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Resource\ClassExistenceResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repos, Request $request, PaginatorInterface $paginator): Response
    {

        $data=$repos->findAll();
        $classes=$paginator->paginate($data,
        $request->query->getInt('page', 1),
        5
    );
        
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'classe' =>$classes
        ]);

    }



    #[Route('/add-classe', name:'apd_classe')]
    public function apd(Request $request, ClasseRepository $repo):Response
    {
        $cl = new Classe();                     

        $form = $this->createForm(ClasseType::class, $cl);
       $form->handleRequest($request);
    //    dd($form->getData());
       
        if($form->isSubmitted()&& $form->isValid()){
            // dd($form->getData());
            $repo->add($form->getData(),true);
            return $this->redirectToRoute('app_classe');
   
        }

        return $this->render('classe/form.html.twig', [
            'form' => $form ->createView() 
             ]);
    }


    #[Route("/edit-classe/{id}", name:"edd_classe")]

   
 public function edit(Request $request,ClasseRepository $repo,$id):Response{
    
$cl=new Classe;

       $cl=$repo->find($id);
      

    $form = $this->createForm(ClasseType::class,$cl);     
          

         $form->handleRequest($request);
   
         if($form->isSubmitted()&& $form->isValid()){
            //  dd($form->getData());
            $repo->add($form->getData(),true);
            return $this->redirectToRoute('app_classe');
   
    }

         return $this->render('classe/form.html.twig', [
            'form' => $form ->createView() 
             ]);
}


  
    
}
