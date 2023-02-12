<div class="p-6 grid grid-cols-[320px_1fr] gap-10">
    <div>
        <div class="bg-white py-7 px-6 max-w-xs shadow-md rounded-lg">
            <h1 class="name font-medium text-xl">Dashboard</h1>
            <div class="pt-4 flex flex-col gap-4">
            <a href="/" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/bar_chart.svg" class="w-6 h-6">
                    <p>Chart</p>
                </a>
                <a href="/payments" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/payments.svg" class="w-6 h-6">
                    <p>Payments</p>
                </a>
                <a href="/chat" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/chat_bubble.svg" class="w-6 h-6">
                    <p>Chat</p>
                </a>
                <a href="/shops" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/store.svg" class="w-6 h-6">
                    <p>Shops</p>
                </a>
                <a href="/tenants" class="flex items-center gap-2 cursor-pointer">
                    <img src="../assets/groups.svg" class="w-6 h-6">
                    <p>Tenants</p>
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
            <div class="grid grid-cols-6 place-items-center place-content-center bg-white p-3 rounded-full shadow-md">
                <p class="font-bold">8418</p>
                <p>1</p>
                <p>10-02-2023</p>
                <p>100,000 IRN</p>
                <p>NEFT</p>
                <div class="flex gap-2">
                    <button class="px-2 py-1 font-medium text-xs text-green-400 bg-green-100 w-min rounded-full">Accept</button>
                    <button class="px-2 py-1 font-medium text-xs text-red-400 bg-red-100 w-min rounded-full">Disapprove</button>
                </div>
            </div>
        </div>
    </div>
</div>