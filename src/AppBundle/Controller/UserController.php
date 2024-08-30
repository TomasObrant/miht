<?php

namespace AppBundle\Controller;

use AppBundle\Factory\UserFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    private $userFactory;

    public function __construct(
        UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
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
}
