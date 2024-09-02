<?php

namespace ChatBundle\Repository;

/**
 * ChatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChatRepository extends \Doctrine\ORM\EntityRepository
{
    public function getChatsByUser(int $userId): array
    {
        $connection = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT
                c.id,
                c.name,
                CASE
                    WHEN m.content IS NOT NULL THEN
                        CONCAT(
                                CASE
                                    WHEN m.user_id = :userId THEN 'Вы: '
                                    ELSE CONCAT(u.username, ': ')
                                    END,
                                m.content
                            )
                    ELSE 'Чат пустой'
                    END AS last
            FROM
                chat c
                    JOIN chat_users cu ON cu.chat_id = c.id
                    JOIN \"user\" u1 ON u1.id = cu.user_id
                    LEFT JOIN message m ON m.id = (
                    SELECT
                        m2.id
                    FROM
                        message m2
                    WHERE
                            m2.chat_id = c.id
                    ORDER BY
                        m2.created_at DESC
                    LIMIT 1
                )
                    LEFT JOIN \"user\" u ON u.id = m.user_id
            WHERE
                    u1.id = :userId
        ";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue("userId", $userId);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
