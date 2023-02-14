<header class="bg-white w-full py-4 px-6 col-span-2 shadow-md relative">
    <h1 class="text-3xl text-slate-900 font-bold">Rentem</h1>
    <?php if ($_SESSION["user_id"]) : ?>
        <form id="form" class="hidden" action="../handlers/logout.php" method="post">
            <input type="text" name="logout" value="logout">
        </form>
        <button form="form" type="submit" class="absolute font-normal hover:bg-slate-300 bg-slate-200 rounded-lg p-2 top-6 right-4 cursor-pointer">
            Log out
        </button>
    <?php endif ?>
</header>