<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{   private $passwordEncoder;

        public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
        $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        

        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('user');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('admin');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('super_admin@gmail.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword('super_user');
        $manager->persist($user);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
        'the_new_password'
        ));
        $manager->flush();
    }
}
