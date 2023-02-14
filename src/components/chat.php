<?php
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Chat.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/models/Message.php');
include_once(dirname($_SERVER['DOCUMENT_ROOT']) . '/src/database/Database.php');

$database = new Database();
$chats = Chat::queryAll($database->connection());
$user_chats = Chat::returnUserChats($chats, $_SESSION["user_id"]);

?>
<div class="m-4 grid grid-cols-[1fr_4fr] h-[470px] overflow-clip bg-white round-lg shadow-md justify-center">
    <div class="border-r-2 h-[470px] border-slate-200 overflow-auto">
        <div class="bg-white h-16 flex items-center justify-between p-6">
            <h1>Messages</h1>
        </div>
        <hr>
        <div class="flex flex-col items-center max-w-sm p-4 px-6">
            <?php foreach ($user_chats as $chat) : ?>
                <a href="/chat/<?= $chat["chat_id"] ?>" class="flex gap-4 hover:cursor-pointer w-full h-20 items-center">
                    <div class="overflow-hidden relative w-full">
                        <p class="text-lg text-slate-900 font-medium ">
                            <?= $chat["name"] ?>
                        </p>
                        <p class="text-sm w-11/12 text-slate-700 font-normal truncate">Open chat to see messages</p>
                        <hr class="mt-3" />
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
    <div class="relative">
        <div class="w-full z-50 bg-white h-16 flex items-center justify-between p-6 border-b-2 mt-px border-slate-100">
        </div>
        <div id="scroll" class="bg-cover h-[340px] bg-white overflow-auto">
        </div>
        <hr>
        <div class="h-16 w-full flex items-center px-6 gap-2">     
                <form class="w-full overflow-hidden" id="message-send">
                    <input id="msg" disabled type="text" placeholder="Select a chat to start typing..." class="w-full h-9 border-2 border-slate-200 bg-white placeholder:text-sm placeholder:truncate px-2 placeholder:text-slate-500  outline-transparent rounded-md leading-10" />
                </form>
                <button id="send_msg" disabled class="p-2 cursor-default bg-slate-200 rounded-md" type="button">
                    <img class="h-5 w-5" src="../assets/send.svg">
                </button>
        </div>
    </div>
</div>