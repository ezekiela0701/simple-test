<?php

namespace App\Controller\fo;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_fo")
     */
    public function index(ContactRepository $contactRepository): Response
    {
        $contact = $contactRepository->findAll() ; 
        return $this->render('fo/contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contact' => $contact
        ]);
    }
}
