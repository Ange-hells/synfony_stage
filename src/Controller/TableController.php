<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TableController extends AbstractController
{
    /**
     * @Route("/table", name="table")
     */
    public function index()
    {
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }

    public function createTable(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $table = new Table();
        $table->setLabble('test');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($table);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$table->getId());
    }
}
