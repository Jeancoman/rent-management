<?php

include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/TenantDetails.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Payment.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Rent.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$user_id = $_SESSION["user_id"];
$user = User::queryById($user_id, $database->connection());
$details = TenantDetails::queryByUserId($user_id, $database->connection());
$rent = Rent::queryByUserId($user_id, $database-> connection());
$payments = Payment::queryAllByUserIdAndRentId($user_id, $rent["id"], $database->connection());
$rentStatus = Rent::rentStatus($payments, $rent);

?>

<div class="p-6 grid grid-cols-[320px_640px] gap-10">
    <div>
        <div class="bg-white py-7 px-6 max-w-xs shadow-md rounded-lg">
            <h1 class="name font-medium text-xl">Dashboard</h1>
            <div class="pt-4 flex flex-col gap-4">
                <a href="/" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/person.svg" class="w-6 h-6">
                    <p>Profile</p>
                </a>
                <a href="/payments" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/payments.svg" class="w-6 h-6">
                    <p>Payments</p>
                </a>
                <a href="/chat" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/chat_bubble.svg" class="w-6 h-6">
                    <p>Chat</p>
                </a>
                <a href="/settings" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/settings.svg" class="w-6 h-6">
                    <p>Account settings</p>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="bg-white p-6 max-w-[300px] shadow-md rounded-lg">
            <div class="flex items-center gap-4">
                <img src="https://thumbs.dreamstime.com/b/user-profile-avatar-icon-134114292.jpg" class="w-16 h-16 rounded-full object-cover">
                <p class="font-medium"> <?= $user["name"] ?> </p>
            </div>
        </div>
        <div class="flex gap-4">
            <div class="bg-white p-3 max-w-fit shadow-md rounded-lg mt-4 flex flex-col gap-1">
                <p class="font-medium">Total pending rent</p>
                <p class="text-sky-600 font-medium text-center"><?=$rentStatus["pending"]?> INR</p>
            </div>
            <div class="bg-white p-3 max-w-fit shadow-md rounded-lg mt-4 flex flex-col gap-1">
                <p class="font-medium">Total paid rent</p>
                <p class="text-sky-600 font-medium text-center"><?=$rentStatus["paid"]?> INR</p>
            </div>
        </div>
        <div class="bg-white p-3 shadow-md rounded-lg flex mt-4 gap-4">
            <div>
                <p class="text-sm font-medium">Address</p>
                <p> <?= $details["address"] ?></p>
            </div>
        </div>
        <div class="bg-white p-6 mt-4 shadow-md rounded-lg flex gap-8">
            <div>
                <p class="text-sm font-medium">Phone Number</p>
                <p><?= $user["phone_number"] ?></p>
            </div>
            <div>
                <p class="text-sm font-medium">Aadhaar Number</p>
                <p> <?= $details["aadhaar_number"] ?></p>
            </div>
            <div>
                <p class="text-sm font-medium">EB Number</p>
                <p> <?= $details["eb_number"] ?></p>
            </div>
            <div>
                <p class="text-sm font-medium">Shop Name</p>
                <p> <?= $details["shop_name"] ?></p>
            </div>
        </div>
    </div>
</div>