<?php

namespace App\Controller;

use App\Entity\Prop;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BiensController extends AbstractController
{
    /**
     * @Route("/biens", name="biens")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Prop::class);
        $prop = $repo->findAll();
        return $this->render('biens/index.html.twig', [
            'controller_name' => 'HomeController',
            'props'=>$prop
        ]);
    }

    /**
     * @Route("/biens/{title}", name="biens_show")
     *
     * @return Response
     */
    public function show($title, Prop $prop){

        //$ad = $repo->findOneBySlug($slug);

        return $this->render('biens/show.html.twig',[
          'props' => $prop
        ]);

    }   
}