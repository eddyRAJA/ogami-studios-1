<?php

namespace App\Controller;

use App\Repository\StudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudioController extends AbstractController
{
    /**
     * @Route("/studio", name="studio")
     */
    public function index(StudioRepository $studios): Response
    {
        return $this->render('studio/index.html.twig', [
            'studios' => $studios->findAll(),
        ]);
    }
}
