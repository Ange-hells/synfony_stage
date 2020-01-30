<?php

namespace App\Controller;

use App\Entity\Test;
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
            // 'test_query' => $this->show(),
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

    public function show()
    {
        $test = $this->getDoctrine()->getRepository(Test::class);
        $var = $test->findAll();
        // $this->deleteTable(3);

        return $this->render('table/index.html.twig', ['controller_name' => 'TableController', "var" => $var]);
    }

    public function deleteTable($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $Table = $this->getDoctrine()->getRepository(Test::class);
        $deletableObject = $Table->find($id);

        $entityManager->remove($deletableObject);
        $entityManager->flush();
    }
       
}    
