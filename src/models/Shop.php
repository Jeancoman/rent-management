<?php

class Shop {

    public static function queryById(int $id, PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM shop WHERE shop_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $shop = $stmt->fetch();
        return $shop;
    }

    public static function update(int $id, string $name, PDO $pdo)
    {
        $stmt = $pdo->prepare('UPDATE shop SET shop_name = :name WHERE shop_id = :id');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}