<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/list", name="category_list", methods={"GET"})
     */
    public function list(Request $request, PaginatorInterface $paginator, CategoryRepository $categoryRepository): Response
    {
        $allCategoryQuery = $categoryRepository->createQueryBuilder('p');
        $categories       = $paginator->paginate($allCategoryQuery, $request->query->getInt('page', 1), 4);

        return $this->render('Category/list.html.twig', [
            'categories' => $categories
        ]);
    }
}