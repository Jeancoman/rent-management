<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Payment.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$payments = Payment::queryAll($database->connection());

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
        <div class="grid grid-cols-6 px-2 py-4 place-items-center place-content-center font-bold">
            <p class="text-slate-500">Reference</p>
            <p class="text-slate-500">Tenant #</p>
            <p class="text-slate-500">Date</p>
            <p class="text-slate-500">Amount</p>
            <p class="text-slate-500">Paid By</p>
            <p class="text-slate-500">Actions</p>
        </div>
        <div>
            <div class="flex flex-col gap-4">
                <?php foreach ($payments as $payment) : ?>
                    <div class="grid grid-cols-6 place-items-center place-content-center bg-white p-3 rounded-full shadow-md">
                        <?php if (!$payment['reference']) : ?>
                            <p class="font-bold">none</p>
                        <?php else : ?>
                            <p class="font-bold"><?= $payment['reference'] ?></p>
                        <?php endif; ?>
                        <p><?= $payment['user_id'] ?></p>
                        <p><?= $payment['date'] ?></p>
                        <p><?= $payment['amount'] ?> IRN</p>
                        <p><?= $payment['paid_by'] ?></p>
                        <?php if ($payment['status'] != "REVIEWING") : ?>
                            <div class="flex gap-2">
                                <button disabled class="px-2 py-1 font-medium text-xs text-slate-400 bg-slate-200 w-min rounded-full">Accept</button>
                                <button disabled class="px-2 py-1 font-medium text-xs text-slate-400 bg-slate-200 w-min rounded-full ">Disapprove</button>
                            </div>
                        <?php else : ?>
                            <div class="flex gap-2">
                                <button id="accept" data-payment="<?= $payment['id'] ?>" class="px-2 py-1 cursor-pointer font-medium text-xs text-green-400 bg-green-100 w-min rounded-full hover:bg-green-200 hover:text-green-500">Accept</button>
                                <button id="disapprove" data-payment="<?= $payment['id'] ?>" class="px-2 py-1 cursor-pointer font-medium text-xs text-red-400 bg-red-100 w-min rounded-full hover:bg-red-200 hover:text-red-500">Disapprove</button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>