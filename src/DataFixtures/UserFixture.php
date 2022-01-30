<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\DateTime;

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
                ->setLastName('Last Name')
                ->setRoles(['ROLE_USER'])
                ->setEmail('user@mail.com')
                ->setCreationDate(new \DateTime('now'));

        $admin  = new User();
        $admin  ->setFirstName('First Name')
                ->setLastName('Last Name')
                ->setRoles(['ROLE_ADMIN'])
                ->setEmail('admin@mail.com')
                ->setCreationDate(new \DateTime('now'));

        for ($i = 1; $i <= 89; $i++) {
            $this->createUser(strval($i), $manager);
        }

        for ($i = 1; $i <= 9; $i++) {
            $this->createAdmin(strval($i), $manager);
        }

        $userPassword = $this->hasher->hashPassword($user, 'azertyuiop');
        $user->setPassword($userPassword);

        $adminPassword = $this->hasher->hashPassword($admin, 'azertyuiop');
        $admin->setPassword($adminPassword);

        $manager->persist($user);
        $manager->persist($admin);
        $manager->flush();
    }

    function randomDate(): \DateTime
    {
        $nowYear = date('Y');
        $start = new \DateTime(intval($nowYear).'-01-01');
        $end = new \DateTime(intval($nowYear).'-12-31');
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new \DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }
    
    function createUser($i, $manager){
        $user   = new User();
        $user   ->setFirstName('First Name')
                ->setLastName('Last Name')
                ->setRoles(['ROLE_USER'])
                ->setEmail('user'.$i.'@mail.com')
                ->setCreationDate($this->randomDate());

        $userPassword = $this->hasher->hashPassword($user, 'user'.$i.'password');
        $user->setPassword($userPassword);
        $manager->persist($user);
    }

    function createAdmin($i, $manager){
        $admin  = new User();
        $admin  ->setFirstName('Admin')
                ->setLastName('Admin')
                ->setRoles(['ROLE_ADMIN'])
                ->setEmail('admin'.$i.'@mail.com')
                ->setCreationDate($this->randomDate());

        $adminPassword = $this->hasher->hashPassword($admin, 'admin'.$i.'password');
        $admin->setPassword($adminPassword);
        $manager->persist($admin);
    }
}
