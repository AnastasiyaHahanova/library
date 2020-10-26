<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/author")
 */
class AuthorController extends AbstractController
{
    /**
     * @Route("/{id}", name="author_show", methods={"GET"})
     */
    public function show(Author $author)
    {
        return $this->render('Author/show.html.twig', [
            'author' => $author,
        ]);
    }

}