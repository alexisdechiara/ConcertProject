<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\ProfileFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function profile(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hasher, Security $security): Response {
        $user = $security->getUser();
        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $password = $user->getPassword();
            $data->setPassword($password);
            $oldPassword = $form->get('oldPassword')->getData();
            if($hasher->isPasswordValid($user,$oldPassword)  && $newPassword = $form->get('newPassword')->getData()) {
                $userPassword = $hasher->hashPassword($data, $newPassword);
                $data->setPassword($userPassword);
            }
            if($file = $form->get('profileImage')->getData()) {
                $image = new Image();
                $image->setFile($file);
                $data->setProfileImage($image);
            }

            $entityManager->persist($data);
            $entityManager->flush();
        }

        return $this->render('user/profile.html.twig', [
            'user' => $security->getUser(),
            'profileForm' => $form->createView(),
        ]);
    }
}
