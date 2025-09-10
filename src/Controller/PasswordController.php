<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

class PasswordController extends AbstractController
{
    public function checkPass(): Response
    {
        // $session = $this->requestStack->getSession();
        // if ($session->get('password') == 'supersait228') {
        //     return;
        // } elseif ($session->get('password')) {
        //     $this->addFlash('error', 'А парольчик-то неправильный!');
        //     return $this->render('admin/alert.html.twig');
        // } else {
        //     $this->addFlash('error', 'Нужно ввести пароль');
        //     return $this->render('admin/alert.html.twig');
        // }

        $session = new Session();
        $session->start();
        if ($session->get('password') == 'supersait228') {
            return 'ы';
        } elseif ($session->get('password')) {
            $this->addFlash('error', 'А парольчик-то неправильный!');
            return $this->render('admin/alert.html.twig');
        } else {
            $this->addFlash('error', 'Нужно ввести пароль');
            return $this->render('admin/alert.html.twig');
        }

        return $this->render('admin/alert.html.twig');
    }
}