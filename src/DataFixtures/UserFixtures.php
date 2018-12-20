<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends AbstractFixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {

        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $anonyme = new User();
        $anonyme->setUsername('Anonyme');
        $anonyme->setPassword($this->passwordEncoder->encodePassword($anonyme, 'user'));
        $anonyme->setEmail('anonyme@test.fr');
        $anonyme->setRoles(array('ROLE_USER'));
        $manager->persist($anonyme);

        $user = new User();
        $user->setUsername('user');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'user'));
        $user->setEmail('user@user.fr');
        $user->setRoles(array('ROLE_USER'));
        $manager->persist($user);

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'));
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(array('ROLE_ADMIN'));
        $manager->persist($admin);

        $userTest = new User();
        $userTest->setUsername('testuser');
        $userTest->setPassword($this->passwordEncoder->encodePassword($userTest, 'user'));
        $userTest->setEmail('testuser@test.fr');
        $userTest->setRoles(array('ROLE_USER'));
        $manager->persist($userTest);

        $this->addReference('anonyme', $anonyme);
        $this->addReference('user', $user);
        $this->addReference('admin', $admin);

        $manager->flush();
    }
}
