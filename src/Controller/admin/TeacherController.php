<?php

namespace App\Controller\admin;

use App\Entity\Teacher;
use App\Form\TeacherType;
use App\Repository\TeacherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/admin")
*/
class TeacherController extends AbstractController
{
    protected $em ;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em ;
    }
    /**
     * @Route("/teacher", name="bo_teacher")
     */
    public function index(TeacherRepository $teacherRepository): Response
    {
        $listTeachers = $teacherRepository->findAll() ;  
        return $this->render('admin/teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
            'listTeachers' => $listTeachers , 
        ]);
    }
    /**
     * @Route("/teacher/add", name="bo_teacher_add")
     * @Route("/teacher/edit/{id}", name="bo_teacher_edit")
     */
    public function addTeacher(Teacher $teacher=null , Request $request): Response
    {
        if (!$teacher) {
            $teacher = new Teacher() ; 
        }
        $form = $this->createForm(TeacherType::class , $teacher) ;

        $form->handleRequest($request) ; 
        if ($form->isSubmitted() && $form->isValid()) {
            $images = $request->files->get("teacher");
            $file = explode('.',$images['photos']->getClientOriginalName());
            
            $filename = $file[0].''.uniqid().'.'.$images['photos']->guessExtension();
    
            $teacher->setPhotos($filename);
    
            $images['photos']->move($this->getParameter('img_teacher'), $filename);
            $this->em->persist($teacher) ;
            $this->em->flush() ;

            return $this->redirectToRoute('bo_teacher');
        }

        return $this->render('admin/teacher/newTeacher.html.twig', [
            'controller_name'   => 'TeacherController',
            'form_teacher'      => $form->createView() , 
            'editMode'          => $teacher->getId() !=null , 
        ]);
    }
}
