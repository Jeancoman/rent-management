<?php 

if(!$_SESSION["user_id"]){
    header("location:/login");
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[80px_1fr_60px] bg-slate-100">
    <?php include "components/header.php"; ?>
    <?php include "components/chat.php"; ?>
    <?php include "components/footer.php"; ?>
</body>

</html>