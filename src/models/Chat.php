<?php

class Chat
{

    public static function queryAll(PDO $pdo)
    {
        $stmt = $pdo->query("SELECT * FROM chat_user c JOIN user u ON u.id = c.user_id");
        $stmt->execute();
        $chats = $stmt->fetchAll();
        return $chats;
    }

    public static function queryAllByChatId(int $id, PDO $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM chat_user c JOIN user u ON u.id = c.user_id WHERE c.chat_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $chats = $stmt->fetchAll();
        return $chats;
    }

    public static function returnInverseUser($chats, int $id){
        foreach($chats as $chat){
            if($chat["user_id"] != $id){
                $returned_chat = $chat;
            }
        }
        return $returned_chat;
    }

    public static function returnUserChats(array $chats, int $id)
    {
        $temp_arr = [];
        $sanitaized = [];

        foreach ($chats as $chat) {
            if ($chat["user_id"] == $id) {
                $temp_arr[$chat["chat_id"]] = $chat;
            }
        }
        foreach ($chats as $chat) {
            if (array_key_exists($chat["chat_id"], $temp_arr))
                if ($chat["chat_id"] == $temp_arr[$chat["chat_id"]]["chat_id"] && $chat["user_id"] != $id) {
                    $sanitaized[$chat["chat_id"]] = $chat;
                }
        }

        return $sanitaized;
    }
}
