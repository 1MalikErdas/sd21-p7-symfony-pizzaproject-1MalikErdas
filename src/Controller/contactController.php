<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class contactController extends AbstractController
{
    #[Route('/pizza/contact')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('pizza/contact.html.twig', [
            'number' => $number,
        ]);
    }
}