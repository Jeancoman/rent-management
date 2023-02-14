<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$db = new Database();

$phone_number = $_POST["phone_number"];
$password = $_POST["password"];
$user = User::queryByPhone($phone_number, $db->connection());
session_start();

if ($user) {
    if ($user["password"] == $password) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_type"] = $user["type"];
        if($user["type"] == "TENANT"){
            header("location:/");
            exit();
        } else {
            header("location:/payments");
            exit();
        }
    } else {
        $_SESSION["login_error"] = "Invalid credentials";
        header("location:/login");
        exit();
    }
} else {
    $_SESSION["login_error"] = "Invalid credentials";
    header("location:/login");
    exit();
}
