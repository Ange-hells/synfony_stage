<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class page1 extends AbstractController
{
    public function index()
    {
        $user_first_name = "hello";
        $userNotification = ['...', '...'];
        
        return $this->render('page1.html.twig', [
            'user_first_name' => $user_first_name,
            'notification' => $userNotification
        ]);
    }
}