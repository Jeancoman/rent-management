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
    <?php include "components/dynamic_chat.php"; ?>
    <?php include "components/footer.php"; ?>
    <script>
        const msgInput = document.querySelector("#msg");
        const sendMsg = document.querySelector("#send_msg");
        const formData = new FormData();

        formData.append("chat_page", true);
        formData.append("user_id", <?= $_SESSION["user_id"] ?>);
        formData.append("chat_id", <?= $chat_id ?>);
        formData.append("msg", msgInput.value);

        msgInput.addEventListener("input", (e) => {
            formData.append("msg", e.target.value);
        })

        sendMsg.addEventListener("click", (e) => {
            console.log("click")
            fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: formData,
            }).then(() => location.reload());
        })
    </script>
</body>

</html>