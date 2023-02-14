<?php

class Rent
{

    public static function queryByUserId(int $id, PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM rent WHERE user_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rent = $stmt->fetch();
        return $rent;
    }

    public static function queryByShopId(int $id, PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM rent WHERE shop_id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rent = $stmt->fetch();
        return $rent;
    }

    public static function queryAll(PDO $pdo)
    {
        $stmt = $pdo->prepare('SELECT * FROM rent r JOIN shop s ON r.shop_id = s.shop_id ORDER BY id DESC');
        $stmt->execute();
        $rents = $stmt->fetchAll();
        return $rents;
    }

    public static function rentStatus($payments, $rent)
    {
        $paid = 0;

        foreach ($payments as $payment) {
            if ($payment["status"] == "ACCEPTED" && $payment["user_id"] == $rent["user_id"])
                $paid += $payment["amount"];
        }

        $pending =$rent["total_amount"] - $paid;

        return ["paid" => $paid, "pending" => $pending];
    }
    public static function updateRent(int $id, $endDate, $totalAmount, $monthlyAmount, PDO $pdo){
        $stmt = $pdo->prepare("UPDATE rent SET end_date = :endDate, total_amount = :totalAmount, monthly_amount = :monthlyAmount WHERE id = :id");
        $stmt->bindParam(":endDate", $endDate);
        $stmt->bindParam(":totalAmount", $totalAmount);
        $stmt->bindParam(":monthlyAmount", $monthlyAmount);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function createRent(int $user_id, $initial_date, $end_date, $total_amount, $monthly_amount, PDO $pdo){
        $stmt = $pdo->prepare("SELECT * FROM user u JOIN tenant_details t ON u.id = t.user_id JOIN shop s ON t.shop_id = s.shop_id WHERE u.id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch();
        $shop_id = $user["shop_id"];
        $stmt = $pdo->prepare("INSERT INTO rent (initial_date, end_date, total_amount, monthly_amount, user_id, shop_id) VALUES (:initial_date, :end_date, :total_amount, :monthly_amount, :user_id, :shop_id)");
        $stmt->bindParam(":initial_date", $initial_date);
        $stmt->bindParam(":end_date", $end_date);
        $stmt->bindParam(":total_amount", $total_amount);
        $stmt->bindParam(":monthly_amount", $monthly_amount);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':shop_id', $shop_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function deleteRent(int $rent_id, PDO $pdo){
        $stmt = $pdo->prepare("DELETE FROM rent WHERE id = :id");
        $stmt->bindParam(':id', $rent_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
