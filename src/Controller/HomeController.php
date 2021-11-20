<?php

namespace App\Controller;

use App\Repository\CompagnyRepository;
use App\Repository\IllustrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class HomeController extends AbstractController
{
    private $illustrationRepo;
    private $compagnyRepo;
 
    public function __construct(
        IllustrationRepository $illustrationRepo,
        CompagnyRepository $compagnyRepo
        )
        {
            $this->illustrationRepo = $illustrationRepo;
            $this->compagnyRepo =$compagnyRepo;
        }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('front/home.html.twig', [
            'illustrations' => $this->illustrationRepo->findAll(),
            'compagnies' => $this->compagnyRepo->findAll()
        ]);
    }

}
