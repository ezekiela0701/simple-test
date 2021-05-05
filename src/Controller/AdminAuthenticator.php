<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminAuthenticator extends AbstractController
{
    /**
     * @Route("/admin/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, UserRepository $userRepository , UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $admin = $userRepository->findByroleadmin();

        // creation admin par defaut
        if(!$admin){
            $user = new User();

            // $Utilisateur->setStatus(1);
            $user->setRoles(array('ROLE_ADMIN'));
            $user->setEmail('admin@admin.com');
            $user->setName('Super');
            $user->setFirstname('Admin');
            $passwordcyrpter = $passwordEncoder->encodePassword($user, 'superadmin');
            $user->setPassword($passwordcyrpter);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }


        return $this->render('security/admin/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/admin/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
