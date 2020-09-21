<?php

namespace App\Controller;

use App\Form\MovieReviewType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(MovieReviewType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd('ça marche');
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
