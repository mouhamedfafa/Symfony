<?php
namespace App\Controller;
use App\Entity\Demande;
use App\Repository\DemandeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeController extends AbstractController
{
    #[Route('/demande', name: 'app_demande')]
    public function index(DemandeRepository $repos,Request $request, PaginatorInterface $paginator): Response
  
    {
        $data=$repos->findAll();
        $demandes=$paginator->paginate($data,
        $request->query->getInt('page', 1),
        5);
        return $this->render('demande/index.html.twig', [
            'controller_name' => 'DemandeController',
            'demande'=>$demandes
        ]);
    }

     
    
}
