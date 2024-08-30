<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    /**
     * @Route("/api/chats", name="chat_list", methods={"GET"})
     */
    public function listAction(): ?Response
    {
        $chats = $this->getDoctrine()
            ->getRepository('AppBundle:Chat')
            ->findAll();

        $chats = [['name'=>'one'],['name'=>'two'],['name'=>'three'],['name'=>'four']];

        return $this->render('chat/list.html.twig', array(
            'chats' => $chats,
        ));
    }

    /**
     * @Route("/api/chats/{id}", name="chat_view")
     */
    public function viewAction($id): ?Response
    {
        $chat = $this->getDoctrine()
            ->getRepository('AppBundle:Chat')
            ->find($id);

        if (!$chat) {
            throw $this->createNotFoundException('Чат не найден');
        }

        // $messages = $this->getDoctrine()
        //    ->getRepository('AppBundle:Message')
        //    ->findBy(array('chat' => $chat));

        return $this->render('chat/view.html.twig', array(
            'chat' => $chat,
            // 'messages' => $messages,
        ));
    }
}
