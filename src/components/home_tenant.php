<?php
$pdo = new PDO('mysql:host=localhost;dbname=rent-management', 'root', '');
$stmt = $pdo->prepare('SELECT * FROM user WHERE id = 1');
$stmt->execute();
$user = $stmt->fetch();
$stmt = $pdo->prepare('SELECT * FROM tenant_details t JOIN shop s ON t.user_id = s.id AND t.user_id = 1');
$stmt->execute();
$details = $stmt->fetch();
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
        <div class="bg-white p-6 max-w-xs shadow-md rounded-lg">
            <div class="flex items-center gap-4">
                <img src="https://english.cdn.zeenews.com/sites/default/files/styles/zm_700x400/public/2017/11/17/639329-indian-men.jpg" class="w-16 h-16 rounded-full object-cover">
                <p class="font-medium">
                    <?php
                    echo ($user["name"])
                    ?>
                </p>
            </div>
        </div>
        <div class="bg-white p-3 max-w-xs shadow-md rounded-lg mt-4 flex gap-1">
            <p>Pending rent:</p>
            <p class="text-sky-600 font-medium">100,000 INR</p>
        </div>
        <div class="bg-white p-3 shadow-md rounded-lg flex mt-4 gap-4">
            <div>
                <p class="text-sm font-medium">Address</p>
                <p> <?php
                    echo ($details["address"])
                    ?></p>
            </div>
        </div>
        <div class="bg-white p-6 mt-4 shadow-md rounded-lg flex gap-8">
            <div>
                <p class="text-sm font-medium">Phone Number</p>
                <p><?php echo ($user["phone_number"])?></p>
            </div>
            <div>
                <p class="text-sm font-medium">Aadhaar Number</p>
                <p> <?php echo ($details["aadhaar_number"]) ?></p>
            </div>
            <div>
                <p class="text-sm font-medium">EB Number</p>
                <p> <?php echo ($details["eb_number"]) ?></p>
            </div>
            <div>
                <p class="text-sm font-medium">Shop Name</p>
                <p> <?php echo ($details["name"]) ?></p>
            </div>
        </div>
    </div>
</div>