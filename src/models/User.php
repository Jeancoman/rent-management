<?php

class User
{

    public static function queryById(int $id, PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    public static function update(int $id,string $name, string $phoneNumber, PDO $pdo)
    {
        $stmt = $pdo->prepare('UPDATE user SET name = :name, phone_number = :phoneNumber WHERE id = :id');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function queryAll(PDO $pdo){
        $stmt = $pdo->prepare("SELECT * FROM user u JOIN tenant_details t ON u.id = t.user_id JOIN shop s ON t.shop_id = s.shop_id");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

    public static function createTenant(string $name, string $password, string $phone_number, PDO $pdo){
        $stmt = $pdo->query("INSERT INTO shop (shop_name) VALUE ('Not set')");
        $stmt->execute();
        $shop_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("INSERT INTO user (name, phone_number, password) VALUE (:name, :phone_number, :password)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $user_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("INSERT INTO tenant_details (address, aadhaar_number, eb_number, shop_id, user_id) VALUE ('Not set', 'Not set', 'Not set', :shop_id, :user_id)");
        $stmt->bindParam(":shop_id", $shop_id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $pdo->query("INSERT INTO chat (name) VALUE ('none')");
        $stmt->execute();
        $chat_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("INSERT INTO chat_user (chat_id, user_id) VALUES (:chat_id, :user_id)");
        $stmt->bindParam(":chat_id", $chat_id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $pdo->prepare("INSERT INTO chat_user (chat_id, user_id) VALUES (:chat_id, 2)");
        $stmt->bindParam(":chat_id", $chat_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $pdo->query("INSERT INTO chat (name) VALUE ('none')");
        $stmt->execute();
        $chat_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("INSERT INTO chat_user (chat_id, user_id) VALUES (:chat_id, :user_id)");
        $stmt->bindParam(":chat_id", $chat_id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $pdo->prepare("INSERT INTO chat_user (chat_id, user_id) VALUES (:chat_id, 3)");
        $stmt->bindParam(":chat_id", $chat_id, PDO::PARAM_INT);
        $stmt->execute();

    }

    public static function returnUsersWithNoRent(PDO $pdo){
        $stmt = $pdo->query("SELECT u.* FROM  user u LEFT JOIN rent r ON u.id = r.user_id WHERE r.user_id IS NULL AND u.type = 'TENANT'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;

    }

    public static function queryByPhone(string $phone_number, PDO $pdo){
        $stmt = $pdo->prepare("SELECT * FROM user WHERE phone_number = :phone_number");
        $stmt->bindParam(":phone_number", $phone_number, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }
}
