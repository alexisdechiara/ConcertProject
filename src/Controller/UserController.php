<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\ProfileFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function profile(Request $request, EntityManagerInterface $entityManager, Security $security): Response {
        $user = $security->getUser();
        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
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
