<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[90px_1fr] grid-cols-1 bg-slate-100">
    <?php include "components/header.php"; ?>
    <div class="place-self-center">
        <div class="p-6 rounded-lg shadow-md bg-white max-w-md max-h-80 flex flex-col justify-center gap-3 px-8">
            <h1 class="font-medium text-lg">Welcome, please sing in!</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Phone number</label>
                    <input type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-600 focus:outline-none" id="exampleInputEmail2" placeholder="Enter phone number">
                </div>
                <div class="mb-6">
                    <label for="exampleInputPassword2" class="form-label inline-block mb-2 text-gray-700">Password</label>
                    <input type="password" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-600 focus:outline-none" id="exampleInputPassword2" placeholder="Password">
                </div>
                <button type="submit" class="w-full px-6 py-2.5 bg-sky-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-800 active:shadow-lg transition duration-150 ease-in-out">
                    Sing in
                </button>
            </form>
        </div>
    </div>
</body>

</html>