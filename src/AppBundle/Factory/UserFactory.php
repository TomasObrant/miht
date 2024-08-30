<?php

namespace AppBundle\Factory;

use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class UserFactory
{
    private $passwordHasher;

    public function __construct(
        UserPasswordEncoderInterface $passwordHasher,
    ) {
        $this->passwordHasher = $passwordHasher;
    }

    public function create(
        string $username,
        string $email,
        string $password
    ): User {
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPassword($password, $this->passwordHasher);

        return $user;
    }
}
