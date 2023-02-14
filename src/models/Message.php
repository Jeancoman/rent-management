<?php 

class Message {

    public static function lastMessageByChatId(int $id, PDO $pdo){
        $stmt = $pdo->prepare("SELECT * FROM message WHERE chat_id = :id ORDER BY message_id DESC");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $message = $stmt->fetch();
        $message;
    }

    public static function queryAllByChatId(int $id, PDO $pdo){
        $stmt = $pdo->prepare("SELECT * FROM message WHERE chat_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $messages = $stmt->fetchAll();
        return $messages;
    }

    public static function createMessage(int $chat_id, int $user_id, string $content, PDO $pdo){
        $stmt = $pdo->prepare("INSERT INTO message (content, user_id, chat_id) VALUES (:content, :user_id, :chat_id)");
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':chat_id', $chat_id, PDO::PARAM_INT);
        $stmt->execute();

    }
}