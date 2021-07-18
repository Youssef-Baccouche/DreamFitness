<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/features", name="features")
     */
    public function feature(): Response
    {
        return $this->render('home/Features.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/subscriptions", name="subscriptions")
     */
    public function subscriptions(): Response
    {
        return $this->render('home/subscriptions.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
