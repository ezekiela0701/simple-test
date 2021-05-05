<?php

namespace App\Controller\admin;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/admin")
*/
class ContactController extends AbstractController
{
    protected $em ; 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em ; 
    }

    /**
     * @Route("/contact/", name="contact_page")
     */
    public function index(Request $request): Response
    {
        $contact = $this->getContact() ; 
        if($contact){
      
            $form = $this->createForm(ContactType::class , $contact) ; 

            $form->handleRequest($request) ; 
            if($form->isSubmitted()&& $form->isValid()){
                $this->em->persist($contact) ; 
                $this->em->flush();
            }
        
            return $this->render('admin/contact/index.html.twig', [
                'controller_name' => 'ContactController',
                'form_contact' => $form->createView() 
            ]);
        }
        return $this->redirectToRoute("contact_page");
    }
    function getContact(): ? Contact
    {
        return $this->em->getRepository(Contact::class)->getInfo();

    }
}
