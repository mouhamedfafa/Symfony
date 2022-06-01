<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
}
