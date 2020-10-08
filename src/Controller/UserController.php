<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/create", name="user.create", methods={"GET", "POST"})
     */
    public function create(Request $request):Response
    {
        $form = $this->createForm(UserType::class, null, []);
        $form->handleRequest($request);
        return  $this->render('User/create.html.twig',['form'=>$form->createView()]);
    }

}