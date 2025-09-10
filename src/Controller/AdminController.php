<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends AbstractController
{
    private $login;
    private $session;
    private $password;

    public function __construct()
    {
        $session = new Session();
        $this->login = $session->get('login') ?? false;
        $this->session = $session;
        $this->password = $_ENV['ADMIN_PASSWORD'];
    }

    public function index(): Response
    {
        if ($this->login) {
            return $this->render('admin/panel.html.twig'); 
        } else {
            return $this->render('admin/alert.html.twig');
        }
    }

    public function login(): Response
    {
        $request = Request::createFromGlobals();
        $pass = $request->request->get('pass');
        if ($pass == $this->password) {
            $session = new Session();
            $login = $session->set('login', 'true');
        }
        return $this->redirectToRoute('admin');
    }

    public function viewPost(PostRepository $post): Response
    {
        if ($this->login == true) {
        $request = Request::createFromGlobals();
        $request = $request->query->get('id');

        $post = $post->find($request);

        return $this->render('admin/panel.html.twig', [
            'page' => 'viewpost',
            'post' => $post
        ]);
        } else {
            return $this->redirectToRoute('admin');
        }
    }

    public function viewPosts(PostRepository $post): Response
    {
        if ($this->login == true) {
        $post = $post->findAll();

        return $this->render('admin/panel.html.twig', [
            'posts' => $post,
            'page' => 'posts'
        ]);
        } else {
            return $this->redirectToRoute('admin');
        }
    }

    public function createPost(ManagerRegistry $doctrine): Response
    {
        if ($this->login == true) {
        $request = Request::createFromGlobals();

        if ($request->isMethod('POST')) {
            $entityManager = $doctrine->getManager();

            $product = new Post();
            $product->setTitle($request->request->get('title'));
            $product->setdate($request->request->get('date'));
            $product->setText($request->request->get('text'));
            $frommobile = $request->request->get('frommobile') ? true : false;
            $product->setFromMobile($frommobile);
    
            $entityManager->persist($product);
    
            $entityManager->flush();
    
            return $this->redirectToRoute('news');
        }

        return $this->render('admin/panel.html.twig', [
            'page' => 'createpost'
        ]);
        } else {
            return $this->redirectToRoute('admin');
        }
    }

    public function updatePost(ManagerRegistry $doctrine): Response
    {
        if ($this->login == true) {
        $request = Request::createFromGlobals();
        $id = $request->query->get('id');

        if ($request->isMethod('POST')) {
            $entityManager = $doctrine->getManager();

            $product = $entityManager->getRepository(Post::class)->find($id);
            $product->setTitle($request->request->get('title'));
            $product->setdate($request->request->get('date'));
            $product->setText($request->request->get('text'));
            $frommobile = $request->request->get('frommobile') ? true : false;
            $product->setFromMobile($frommobile);
    
            $entityManager->persist($product);
    
            $entityManager->flush();
    
            return $this->redirectToRoute('news');
        }

        return $this->render('admin/panel.html.twig', [
            'page' => 'createpost'
        ]);
        } else {
            return $this->redirectToRoute('admin');
        }
    }

    public function deletePost(ManagerRegistry $doctrine, PostRepository $post): Response
    {
        if ($this->login == true) {
        $request = Request::createFromGlobals();
        $id = $request->query->get('id');

        if ($request) {
            $entityManager = $doctrine->getManager();

            $post = $post->find($id);
            $entityManager->remove($post);
    
            $entityManager->flush();
    
            return $this->redirectToRoute('adminPage');
        }

        return $this->render('admin/panel.html.twig', [
            'page' => 'createpost'
        ]);
        } else {
            return $this->redirectToRoute('admin');
        }
    }
}
