<?php

namespace AppBundle\Controller;

use AppBundle\Factory\UserFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    private $userFactory;

    public function __construct(
        UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {

    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = $this->userFactory->create(
            $data['username'],
            $data['email'],
            $data['password']
        );

        return new JsonResponse('ok');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {

    }
}
