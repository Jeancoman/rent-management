<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/User.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$users = User::returnUsersWithNoRent($database->connection());

?>

<div class="h-fit border-2 p-4 fixed top-24 left-1/3 bg-white rounded-lg hidden place-content-center" id="new_dialog">
    <form class="p-2">
        <div class="mb-4">
            <h1 class="font-bold text-lg">New rent information</h1>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-6">
                <input required type="date" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="new_initial_date" placeholder="Initial date">
            </div>
            <div class="mb-6">
                <input required type="date" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="new_end_date" placeholder="End date">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-6">
                <input required type="text" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="new_monthly_amount" placeholder="Monthly amount">
            </div>
            <div class="mb-6">
                <input required type="tel" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="new_total_amount" placeholder="Total amount">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <select required id="select_user" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transitio ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-600 focus:outline-none">
                        <option selected>Select user</option>
                        <?php foreach($users as $user): ?>
                        <option value="<?= $user["id"] ?>"><?= $user["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        <button type="button" id="save_rent" class="w-36 px-6 py-2.5 bg-sky-500 mr-2 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-lg transition duration-150 ease-in-out">
            Save
        </button>
        <button type="button" id="new_cancel" class="w-36 px-6 py-2.5 bg-red-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-500 hover:shadow-lg focus:bg-red-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-600 active:shadow-lg transition duration-150 ease-in-out">
            Cancel
        </button>
    </form>
</div>