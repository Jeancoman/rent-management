<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Payment.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Rent.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$payments = Payment::queryAllByUserId($_SESSION["user_id"], $database->connection());

?>

<div class="p-6 grid grid-cols-[320px_1fr] gap-10">
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
        <div class="grid grid-cols-5 px-2 py-4 place-items-center place-content-center font-bold">
            <p class="text-slate-500">Reference</p>
            <p class="text-slate-500">Status</p>
            <p class="text-slate-500">Date</p>
            <p class="text-slate-500">Amount</p>
            <p class="text-slate-500">Paid By</p>
        </div>
        <div class="flex flex-col gap-4">
            <?php foreach ($payments as $payment) : ?>
                <div class="grid grid-cols-5 place-items-center place-content-center bg-white p-3 rounded-full shadow-md">
                    <p class="font-bold"><?= $payment['reference'] ?></p>
                    <?php if ($payment['status'] == "ACCEPTED") : ?>
                        <p class="px-2 py-1 font-medium text-xs text-green-500 bg-green-200 w-min rounded-full"><?= $payment['status'] ?></p>
                    <?php elseif ($payment['status'] == "DECLINED") : ?>
                        <p class="px-2 py-1 font-medium text-xs text-red-500 bg-red-200 w-min rounded-full"><?= $payment['status'] ?></p>
                    <?php else : ?>
                        <p class="px-2 py-1 font-medium text-xs text-slate-500 bg-slate-200 w-min rounded-full"><?= $payment['status'] ?></p>
                    <?php endif; ?>
                    <p><?= $payment['date'] ?></p>
                    <p><?= $payment['amount'] ?> IRN</p>
                    <p><?= $payment['paid_by'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>