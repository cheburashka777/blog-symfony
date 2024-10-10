<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    public function index(PostRepository $post): Response
    {
        $post = $post->findAll();

        return $this->render('news.html.twig', [
            'posts' => $post
        ]);
    }
}
