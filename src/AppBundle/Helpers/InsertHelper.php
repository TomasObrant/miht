<?php

declare(strict_types=1);

namespace AppBundle\Helpers;

class InsertHelper
{
    public static function insertTestDataStart(): array
    {
        return [
            "INSERT INTO \"user\" (username, password, email, is_active) VALUES 
               ('user1', 'password1', 'user1@example.com', true),
               ('user2', 'password2', 'user2@example.com', true),
               ('user3', 'password3', 'user3@example.com', false),
               ('user4', 'password4', 'user4@example.com', true),
               ('user5', 'password5', 'user5@example.com', true),
               ('user6', 'password6', 'user6@example.com', true),
               ('user7', 'password7', 'user7@example.com', true),
               ('user8', 'password8', 'user8@example.com', false),
               ('user9', 'password9', 'user9@example.com', true),
               ('user10', 'password10', 'user10@example.com', true);",

            "INSERT INTO chat (name) VALUES 
               ('General'),
               ('Random'),
               ('Development'),
               ('Sports'),
               ('Music'),
               ('Movies'),
               ('Travel'),
               ('Technology'),
               ('Health'),
               ('Education');",

            "INSERT INTO message (user_id, chat_id, content, created_at) VALUES
               (1, 1, 'Hello everyone!', '2024-09-01 10:00:00'),
               (2, 1, 'Hi, how are you?', '2024-09-01 10:05:00'),
               (3, 1, 'What’s up?', '2024-09-01 10:10:00'),
               (4, 2, 'Anyone interested in sports?', '2024-09-01 12:00:00'),
               (5, 2, 'I love soccer!', '2024-09-01 12:05:00'),
               (6, 3, 'What’s your favorite movie?', '2024-09-01 13:00:00'),
               (7, 4, 'What sports do you play?', '2024-09-01 14:00:00'),
               (8, 1, 'I just started watching a new show!', '2024-09-01 15:00:00'),
               (9, 5, 'I’m learning guitar!', '2024-09-01 15:05:00'),
               (10, 6, 'I went traveling last month, it was awesome!', '2024-09-01 16:00:00'),
               (1, 7, 'Technology is evolving so fast!', '2024-09-01 17:00:00'),
               (2, 8, 'Health is very important!', '2024-09-01 18:00:00'),
               (3, 9, 'Education is the key!', '2024-09-01 19:00:00'),
               (4, 10, 'What do you think about online courses?', '2024-09-01 20:00:00'),
               (5, 3, 'Anyone seen the latest superhero movie?', '2024-09-01 21:00:00'),
               (6, 5, 'I love classical music!', '2024-09-01 22:00:00'),
               (7, 6, 'Let’s plan a trip together!', '2024-09-01 23:00:00'),
               (8, 7, 'What’s your travel bucket list?', '2024-09-01 00:00:00'),
               (9, 8, 'Need some recommendations on tech gadgets!', '2024-09-01 01:00:00'),
               (10, 9, 'Mental health is crucial!', '2024-09-01 02:00:00');",

            "INSERT INTO chat_users (chat_id, user_id) VALUES
               (1, 1),
               (1, 2),
               (1, 3),
               (2, 4),
               (2, 5),
               (3, 7),
               (4, 7),
               (5, 8),
               (6, 9),
               (7, 10),
               (8, 1),
               (9, 2),
               (10, 3),
               (1, 4),
               (2, 6),
               (3, 6),
               (4, 8),
               (5, 9),
               (6, 10);"
        ];
    }
}