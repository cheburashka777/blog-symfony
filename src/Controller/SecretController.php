<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class SecretController extends AbstractController
{
    public function index(): Response
    {
        $request = Request::createFromGlobals();
        $request = $request->query->get('password');

        if (isset($request)) {
            if ($request == 89228 ||
            mb_strtolower($request) == 'на горшке сидел король' ||
            mb_strtolower($request) == 'пушной') {
                return $this->render('secret/secret.html.twig');
            }
            elseif ($request == $_ENV['ADMIN_PASSWORD']) {
                $session = new Session();
                $session->start();
                $session->set('login', 'true');
                return $this->redirectToRoute('admin');
            } elseif ($request == '') {
                $this->addFlash('error', 'Не хочешь вводить? Ну тогда ладно');
                return $this->render('secret/index.html.twig');
            } elseif (mb_strtolower($request) == 'путин') {
                $this->addFlash('error', 'Почти угадал :)');
                return $this->render('secret/secret.html.twig');
            } elseif (mb_strtolower($request) == 'хуй') {
                $this->addFlash('error', 'сам такой');
                return $this->render('secret/index.html.twig');
            } elseif (mb_strtolower($request) == 'пароль') {
                $this->addFlash('error', 'Это не так работает');
                return $this->render('secret/index.html.twig');
            } else {
                $this->addFlash('error', 'А парольчик-то неправильный!');
                return $this->render('secret/index.html.twig');
            }
        } else {
            return $this->render('secret/index.html.twig');
        }
    }
}
