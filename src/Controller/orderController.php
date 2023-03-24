<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;

class orderController extends AbstractController
{
    #[Route('/pizza/order')]
    public function products(ManagerRegistry $doctrine): Response
    {
        $products=$doctrine->getRepository(Category::class)->findAll();
        return $this->render('pizza/order.html.twig',['products'=>$products]);
    }
}