<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class OrderController extends AbstractController
{
    #[Route("/pizza/order/{id}", name: "order")]
    public function showOrder(EntityManagerInterface $entityManager, Request $request, int $id)
    {
        $pizza = $entityManager->getRepository(Pizzas::class)->find($id);
        $order = new Order();

        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $order->setPizza($pizza);
            $entityManager->persist($order);
            $entityManager->flush();
            $this->addFlash('success' );
            return $this->redirectToRoute('contact');


        }

        return $this->render("pizza/order.html.twig", [
            'pizza' => $pizza,
            'form' => $form,
        ]);

    }

}
