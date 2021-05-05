<?php

namespace App\Controller\fo;

use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher", name="fo_teacher")
     */
    public function index(TeacherRepository $teacherRepository): Response
    {
        $teacherLists = $teacherRepository->findAll();
        return $this->render('fo/teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
            'teacherLists'      => $teacherLists ,
        ]);
    }
}
