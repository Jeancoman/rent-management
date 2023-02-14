<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Rent.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$rents = Rent::queryAll($database->connection());

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
                <a href="/rents" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/receipt_long.svg" class="w-6 h-6">
                    <p>Rent</p>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="grid grid-cols-8 px-2 py-4 place-items-center place-content-center font-bold">
            <p class="text-slate-500">Rent #</p>
            <p class="text-slate-500">Tenant #</p>
            <p class="text-slate-500">Shop</p>
            <p class="text-slate-500">Start</p>
            <p class="text-slate-500">End</p>
            <p class="text-slate-500">Total</p>
            <p class="text-slate-500">Monthly</p>
        </div>
        <div>
            <div class="flex flex-col gap-4">
                <?php foreach ($rents as $rent) : ?>
                    <div class="grid text-center grid-cols-8 place-items-center place-content-center bg-white p-3 rounded-full shadow-md">
                        <p class="font-bold"><?= $rent["id"] ?></p>
                        <p><?= $rent["user_id"] ?></p>
                        <p class="truncate w-28 justify-self-center text-center"><?= $rent["shop_name"] ?></p>
                        <p><?= $rent["initial_date"] ?></p>
                        <p id="end_date" data-rent="<?= $rent["id"] ?>"><?= $rent["end_date"] ?></p>
                        <p id="total_amount" data-rent="<?= $rent["id"] ?>"><?= $rent["total_amount"] ?> IRN</p>
                        <p id="monthly_amount" data-rent="<?= $rent["id"] ?>"><?= $rent["monthly_amount"] ?> IRN</p>
                        <div class="flex gap-2">
                            <img id="edit" data-rent="<?= $rent["id"] ?>" src="../assets/edit.svg" class="h-6 w-6 cursor-pointer">
                            <img id="delete" data-rent="<?= $rent["id"] ?>" src="../assets/delete_forever_.svg" class="h-6 w-6 cursor-pointer">
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>