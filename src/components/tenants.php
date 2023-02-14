<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Rent.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Payment.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$rents = Rent::queryAll($database->connection());
$users = User::queryAll($database->connection());
$payments = Payment::queryAll($database->connection());
$rentStatus = [];

foreach ($rents as $rent) {
    $status = Rent::rentStatus($payments, $rent);
    $rentStatus[$rent["user_id"]] = $status;
}

?>

<div class="p-6 grid grid-cols-[320px_1fr] gap-10">
    <div>
        <div class="bg-white py-7 px-6 max-w-xs shadow-md rounded-lg">
            <h1 class="name font-medium text-xl">Dashboard</h1>
            <div class="pt-4 flex flex-col gap-4">
                <a href="/payments" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/payments.svg" class="w-6 h-6">
                    <p>Payments</p>
                </a>
                <a href="/chat" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/chat_bubble.svg" class="w-6 h-6">
                    <p>Chat</p>
                </a>
                <a href="/tenants" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/groups.svg" class="w-6 h-6">
                    <p>Tenants</p>
                </a>
                <a href="/rent" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/receipt_long.svg" class="w-6 h-6">
                    <p>Rent</p>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="grid grid-cols-5 px-2 py-4 place-items-center place-content-center font-bold">
            <p class="text-slate-500">Tenant #</p>
            <p class="text-slate-500">Tenant Name</p>
            <p class="text-slate-500">Shop Name</p>
            <p class="text-slate-500">Pending Rent</p>
            <p class="text-slate-500">Paid Rent</p>
        </div>
        <div>
            <div class="flex flex-col gap-4">
                <?php foreach ($users as $user) : ?>
                    <div class="grid grid-cols-5 place-items-center place-content-center bg-white p-3 rounded-full shadow-md">
                        <p class="font-bold"><?= $user["user_id"] ?></p>
                        <p><?= $user["name"] ?></p>
                        <p><?= $user["shop_name"] ?></p>
                        <?php if ($rentStatus[$user["user_id"]]) : ?>
                            <p><?= $rentStatus[$user["user_id"]]["pending"] ?> IRN</p>
                            <p><?= $rentStatus[$user["user_id"]]["paid"] ?> IRN</p>
                        <?php else : ?>
                            <p>0 IRN</p>
                            <p>0 IRN</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>