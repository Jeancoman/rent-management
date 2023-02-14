<?php 

include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/TenantDetails.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Shop.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Rent.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Message.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Payment.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$db = new Database();

if(isset($_POST['edit_user_account'])){
    $tenantName = $_POST["name"];
    $phoneNumber = $_POST["phone"];
    $address = $_POST["address"];
    $eb = $_POST["eb"];
    $aadhaar = $_POST["aadhaar"];
    $shopName = $_POST["shop"];
    $shopId = $_POST["shop_id"];
    $userId = $_POST["user_id"];
    TenantDetails::updateDetailsByUserId($userId, $address, $aadhaar, $eb, $db -> connection());
    User::update($userId, $tenantName, $phoneNumber, $db->connection());
    Shop::update($shopId, $shopName, $db->connection());
}

if(isset($_POST["edit_rent"])){
    $rentId = $_POST["rent_id"];
    $endDate = $_POST["end_date"];
    $totalAmount = $_POST["total_amount"];
    $monthlyAmount = $_POST["monthly_amount"];
    $mysqlDate = date("Y-m-d",strtotime($endDate));
    Rent::updateRent($rentId, $mysqlDate, $totalAmount, $monthlyAmount, $db->connection());
}

if(isset($_POST["chat_page"])){
    $chat_id = $_POST["chat_id"];
    $user_id = $_POST["user_id"];
    $content = $_POST["msg"];
    Message::createMessage($chat_id, $user_id, $content, $db->connection());
}

if(isset($_POST["new_payment"])){
    $rent_id = $_POST["rent_id"];
    $user_id = $_POST["user_id"];
    $reference = $_POST["reference"];
    $paid_by = $_POST["paid_by"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];
    $mysql_date = date("Y-m-d",strtotime($date));
    Payment::createPayment($rent_id, $user_id, $amount, $mysql_date, $paid_by, $reference, $db->connection());
}

if(isset($_POST["edit_payment_status"])){
    $status = $_POST["status"];
    $payment_id = $_POST["payment_id"];
    Payment::updatePaymentStatus($payment_id, $status, $db->connection());
}

if(isset($_POST["new_tenant"])){
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    User::createTenant($name, $password, $phone_number, $db->connection());
}

if(isset($_POST["new_rent"])){
    $initial_date = $_POST["initial_date"];
    $end_date = $_POST["end_date"];
    $user_id = $_POST["user_id"];
    $total_amount = $_POST["total_amount"];
    $monthly_amount = $_POST["monthly_amount"];
    $mysql_initial_date = date("Y-m-d",strtotime($initial_date));
    $mysql_end_date = date("Y-m-d",strtotime($end_date));
    Rent::createRent($user_id, $mysql_initial_date, $mysql_end_date, $total_amount, $monthly_amount, $db->connection());
}

if(isset($_POST["delete_rent"])){
    $rent_id = $_POST["rent_id"];
    Rent::deleteRent($rent_id, $db->connection());
}