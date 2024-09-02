<?php

namespace AppBundle\Controller;

use AppBundle\Factory\UserFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function indexAction(Request $request): Response
    {
        $isLoggedIn = (bool)$this->getUser();
        $isLoggedIn = true;
        return $this->render('index.html.twig', [
            'isLoggedIn' => $isLoggedIn,
        ]);
    }
}
