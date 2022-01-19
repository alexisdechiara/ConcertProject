<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager, ): void
    {
        $user   = new User();
        $user   ->setFirstName('First Name')
                ->setLastName('LastName')
                ->setEmail('user@mail.com');

        $admin  = new User();
        $admin  ->setFirstName('Admin')
                ->setLastName('Admin')
                ->setEmail('admin@mail.com');

        $userPassword = $this->hasher->hashPassword($user, 'azertyuiop');
        $user->setPassword($userPassword);

        $adminPassword = $this->hasher->hashPassword($admin, 'azertyuiop');
        $admin->setPassword($adminPassword);

        $manager->persist($user);
        $manager->persist($admin);
        $manager->flush();
    }
}
