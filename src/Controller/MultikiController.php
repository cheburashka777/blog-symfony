<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MultikiController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('multiki.html.twig');
    }
}
