<?php

namespace ChatBundle\Controller;

use ChatBundle\Entity\Chat;
use ChatBundle\Form\ChatType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    /**
     * @Route("/chat", name="chat_list")
     */
    public function listAction(Request $request): ?Response
    {
//        $user = $this->getUser();
        $userId = 1;

        $chats = $this->getDoctrine()
            ->getRepository('ChatBundle:Chat')
            ->getChatsByUser($userId);

        $chat = new Chat();
        $form = $this->createForm(ChatType::class, $chat);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($chat);
                $em->flush();

                return $this->redirectToRoute('chat_list');
            }
        }

        return $this->render('chat/list.html.twig', [
            'chats' => $chats,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/chat/{id}", name="chat_view")
     */
    public function viewAction($id): ?Response
    {
        $chat = $this->getDoctrine()
            ->getRepository('ChatBundle:Chat')
            ->find($id);

        if (!$chat) {
            throw $this->createNotFoundException('Чат не найден');
        }

        $messages = $this->getDoctrine()
           ->getRepository('AppBundle:Message')
           ->findMessagesByChatAndUserV2($chat, $this->getUser());

        $messages = [
            'messages' => [
                ['user' => 'me', 'text' => 'Привет!'],
                ['user' => 'Антон', 'text' => 'Памидор!'],
                ['user' => 'Антон', 'text' => 'Огурец!'],
                ['user' => 'me', 'text' => 'Пока!'],
            ]
        ];

        return $this->render('chat/view.html.twig', array(
            'chat' => $chat,
            'messages' => $messages,
        ));
    }

    /**
     * @Route("/message/send/{chatId}", name="message_send", methods={"POST"})
     */
    public function sendMessageAction(Request $request, $chatId): ?Response
    {
        $messageText = $request->request->get('message');

        // Здесь добавьте логику для сохранения сообщения в базе данных

        return $this->redirectToRoute('chat_view', ['id' => $chatId]);
    }
}
