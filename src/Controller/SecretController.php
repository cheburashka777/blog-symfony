<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecretController extends AbstractController
{
    public function index(): Response
    {
        $request = Request::createFromGlobals();
        $request = $request->query->get('password');

        if ($request == 89228) return $this->render('secret/secret.html.twig');
        if (isset($request) && $request == '') { $this->addFlash('error', 'Не хочешь вводить? Ну тогда ладно'); return $this->render('secret/index.html.twig'); }
        if (isset($request) && $request != 89228) { $this->addFlash('error', 'А парольчик-то неправильный!'); return $this->render('secret/index.html.twig'); }

        return $this->render('secret/index.html.twig');
    }
}
