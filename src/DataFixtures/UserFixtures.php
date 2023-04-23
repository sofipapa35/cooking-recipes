<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    //
    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->encoder = $userPasswordHasherInterface;
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user -> setEmail('jean@test.com');
        $user -> setNom('test');
        $user -> setPrenom('jean');
        $manager->persist($user);
        $password = $this->encoder->hashPassword($user, "soleil");
        $user->setPassword($password);
        $user->setRoles(['ROLE_USER']);
        $user->setIsVerified(true);
        $manager->flush();
        
        $user = new User();
        $user -> setEmail('sofi@test.com');
        $user -> setNom('test');
        $user -> setPrenom('sofi');
        $manager->persist($user);
        $password = $this->encoder->hashPassword($user, "soleil");
        $user->setPassword($password);
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user->setIsVerified(true);
        $manager->flush();
    }
}
