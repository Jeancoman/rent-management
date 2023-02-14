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
    <div class="pr-16">
        <div class="shadow-lg rounded-lg overflow-hidden">
            <canvas class="p-10 bg-white max-w-4xl" id="chartBar"></canvas>
        </div>
    </div>
</div>