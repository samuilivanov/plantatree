<?php

namespace App\Service;

use App\Entity\User;

use Symfony\Component\Form\Form;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Form\FormInterface;

/**
 *
 */
class UserService
{
    private $user;
    private $form;
    private $passwordEncoder;

    function __construct(User $user, Form $form, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->user = $user;
        $this->form = $form;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function writeToDataBase()
    {
        $this->user->setPassword(
            $this->passwordEncoder->encodePassword(
                $this->user,
                $this->form->get('plainPassword')->getData()
            )
        );

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
    }

}
