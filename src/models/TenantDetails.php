<?php
class TenantDetails {

    public static function queryByUserId(int $id, PDO $pdo){
        $stmt = $pdo->prepare("SELECT * FROM tenant_details t JOIN shop s ON t.shop_id = s.shop_id AND t.user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $details = $stmt->fetch();
        return $details;
    }
    public static function updateDetailsByUserId(int $id, string $address, string $aadhaar, string $eb, PDO $pdo)
    {
        $stmt = $pdo->prepare('UPDATE tenant_details SET aadhaar_number = :aadhaar, eb_number = :eb, address = :address WHERE user_id = :id');
        $stmt->bindParam(':aadhaar', $aadhaar, PDO::PARAM_STR);
        $stmt->bindParam(':eb', $eb, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
