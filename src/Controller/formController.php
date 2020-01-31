<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\FormulaireTestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class formController extends AbstractController
{
    public function new(Request $request)
    {
        $test = new Test();
        $test->setlabble('');

        $form = $this->createForm(FormulaireTestType::class);

        return $this->render('form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}