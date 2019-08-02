<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Route("/register", methods="POST")
     */
    public function registerProcess(Request $request)
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $this->userService->save($user, $form);
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/register", name="app_register", methods="GET")
     */
    public function register()
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
