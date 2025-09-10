<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends AbstractController
{
    public function index(): Response
    {
        $session = new Session();
        return $this->render('index.html.twig', [
            'login' => $session->get('login')
        ]);
    }
}
