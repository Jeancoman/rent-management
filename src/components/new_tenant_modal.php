<div class="h-fit min-w-max border-2 p-4 fixed top-24 left-[40%] right-2/3 bg-white rounded-lg hidden place-content-center" id="dialog">
    <form id="form" class="p-2">
        <div class="mb-4">
            <h1 class="font-bold text-lg">New tenant information</h1>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="mb-6">
                <input required type="text" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="name" placeholder="Name">
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="mb-6">
                <input required type="text" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="phone" placeholder="Phone number">
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="mb-6">
                <input required type="text" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-500 focus:outline-none" id="password" placeholder="Password">
            </div>
        </div>
        <div class="flex flex-col gap-2">
        <button type="button" id="save" class="w-full px-6 py-2.5 bg-sky-500 mr-2 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-lg transition duration-150 ease-in-out">
            Save
        </button>
        <button type="button" id="cancel" class="w-full px-6 py-2.5 bg-red-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-500 hover:shadow-lg focus:bg-red-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-600 active:shadow-lg transition duration-150 ease-in-out">
            Cancel
        </button>
        </div>
    </form>
</div>