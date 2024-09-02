<?php

namespace AppBundle\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getChat();
    }

    public function getMessage()
    {
        $chat = $this->entityManager->getRepository('ChatBundle:Chat')->find(1);
        $currentUser = $this->entityManager->getRepository('AppBundle:User')->find(1);

        $messages = $this->entityManager->getRepository('ChatBundle:Message')
            ->findMessagesByChatAndUserV2($chat, $currentUser);

        var_dump($messages);
        die();
    }

    public function getChat()
    {
        $chats = $this->entityManager->getRepository('ChatBundle:Chat')
            ->getChatsByUser(1);

        var_dump($chats);
        die();
    }
}