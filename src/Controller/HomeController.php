<?php

namespace App\Controller;

use App\Entity\Prop;
use App\Repository\PropRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PropRepository $repository): Response
    {
        $repo = $this->getDoctrine()->getRepository(Prop::class);
        $prop = $repo->findAll(3);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'props'=>$prop
        ]);
    }
}
