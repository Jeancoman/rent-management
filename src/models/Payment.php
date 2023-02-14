<?php

class Payment
{
    public static function queryAllByUserId(int $id, PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM payment WHERE user_id = :id ORDER BY date DESC');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $payments = $stmt->fetchAll();
        return $payments;
    }
    public static function queryAllByUserIdAndRentId(int $userId, int $rentId, PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM payment WHERE user_id = :userId AND rent_id = :rentId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':rentId', $rentId, PDO::PARAM_INT);
        $stmt->execute();
        $payments = $stmt->fetchAll();
        return $payments;
    }
    public static function queryAll(PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM payment ORDER BY date DESC');
        $stmt->execute();
        $payments = $stmt->fetchAll();
        return $payments;
    }
    public static function createPayment(int $rent_id, int $user_id, $amount, $date, $paid_by, $reference, PDO $pdo)
    {
        $stmt = $pdo->prepare("INSERT INTO payment (amount, date, paid_by, reference, user_id, rent_id) VALUES (:amount, :date, :paid_by, :reference, :user_id, :rent_id)");
        $stmt->bindParam(':reference', $reference);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':rent_id', $rent_id, PDO::PARAM_INT);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':paid_by', $paid_by);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    public static function updatePaymentStatus(int $id, string $status, PDO $pdo){
        $stmt = $pdo->prepare("UPDATE payment SET status = :status WHERE id = :id");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}
