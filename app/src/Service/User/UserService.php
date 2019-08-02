<?php

namespace App\Service\User;
use App\Service\User\UserServiceInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Encription\EncriptionService;
/**
 *
 */
class UserService implements UserServiceInterface
{
    private $passwordEncoder;
    private $userRepositoty;
    private $security;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepositoty, EncriptionService $security)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepositoty = $userRepositoty;
        $this->security = $security;
    }

    public function save(User $user)
    {
        $passwordHash = $this->security->hash($user->getPassword());
        $user->setPassword($passwordHash);
        $this->userRepositoty->insert($user);
    }
}
