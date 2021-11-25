<?php

namespace App\Controller;

use App\Repository\AboutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    private $about;
    public function __construct(AboutRepository $about)
    {
        $this->about =$about;
    }
    /**
     * @Route("/about", name="about")
     */
    public function index(): Response
    {
        return $this->render('front/about.html.twig', [
            'abouts' => $this->about->findall(),
        ]);
    }
}
