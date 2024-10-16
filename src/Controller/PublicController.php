<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PostRepository;

class PublicController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(PostRepository $PostRepository): Response
    {
        $user = $this->getUser();
        $posts = $PostRepository->findAllPublished();
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
