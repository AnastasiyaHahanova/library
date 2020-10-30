<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

/**
 * @Route("/author")
 */
class AuthorController extends AbstractController
{

    /**
     * @Route("/list", name="authors_list", methods={"GET"})
     */
    public function list(AuthorRepository $authorRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $authorQuery = $authorRepository->createQueryBuilder('a');
        $authors     = $paginator->paginate($authorQuery, $request->query->getInt('page', 1), 4);

        return $this->render('Author/list.html.twig', [
            'authors' => $authors
        ]);
    }

    /**
     * @Route("/{id}", name="author_show", methods={"GET"})
     * @Entity("author", options={"mapping": {"id": "id"}})
     * @param Author $author
     * @return Response
     */
    public function show(Author $author): Response
    {
        return $this->render('Author/show.html.twig', [
            'author' => $author,
        ]);
    }

}