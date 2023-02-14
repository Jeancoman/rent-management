<?php

include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/TenantDetails.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$user = User::queryById($_SESSION["user_id"], $database->connection());
$details = TenantDetails::queryByUserId($_SESSION["user_id"], $database->connection());

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
        <div class="bg-white py-7 px-6 max-w-2xl shadow-md rounded-lg block">
            <form id="form">
                <div class="flex items-center gap-4 mb-6 cursor-pointer">
                    <img src="https://thumbs.dreamstime.com/b/user-profile-avatar-icon-134114292.jpgg" class="w-16 h-16 rounded-full object-cover">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <input required type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="name" value="<?= $user["name"] ?>" placeholder="Name">
                    </div>
                    <div class="form-group mb-6">
                        <input required type="tel" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="phone" value="<?= $user["phone_number"] ?>" placeholder="Phone number">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <input required type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="aadhaar" value="<?= $details["aadhaar_number"] ?>" placeholder="Aadhaar number">
                    </div>
                    <div class="form-group mb-6">
                        <input required type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="eb" value="<?= $details["eb_number"] ?>" placeholder="EB number">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <input required type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="address" value="<?= $details["address"] ?>" placeholder="Address">
                    </div>
                    <div class="mb-6">
                        <input required type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="shop" value="<?= $details["shop_name"] ?>" placeholder="Shop name">
                        <input required type="text" class="hidden" id="shop_id" value="<?= $details["shop_id"] ?>" />
                    </div>
                </div>
                <button type="button" id="btn" class="w-36 px-6 py-2.5 bg-sky-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-lg transition duration-150 ease-in-out">
                    Save changes
                </button>
            </form>
        </div>
    </div>
</div>