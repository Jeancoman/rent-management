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
        <div>
            <div class="grid grid-cols-5 place-items-center place-content-center bg-white p-3 rounded-full shadow-md">
                <p class="font-bold">8418</p>
                <p class="px-2 py-1 text-xs bg-slate-300 w-min rounded-full">Processing</p>
                <p>10-02-2023</p>
                <p>100,000 IRN</p>
                <p>NEFT</p>
            </div>
        </div>
    </div>
</div>