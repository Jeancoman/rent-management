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
    <title>Settings</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[80px_1fr_60px] bg-slate-100">
    <?php include "components/header.php"; ?>
    <?php include "components/settings_tenant.php"; ?>
    <?php include "components/footer.php"; ?>
    <script>
        const tenantName = document.querySelector("#name");
        const phoneNumber = document.querySelector("#phone");
        const eb = document.querySelector("#eb");
        const ad = document.querySelector("#aadhaar");
        const address = document.querySelector("#address");
        const shopName = document.querySelector("#shop");
        const shopId = document.querySelector("#shop_id");
        const button = document.querySelector("#btn");
        const userId = document.querySelector("#user_id")
        const formData = new FormData();
        
        formData.append("edit_user_account", true);
        formData.append("name", tenantName.value);
        formData.append("phone", phoneNumber.value);
        formData.append("eb", eb.value);
        formData.append("aadhaar", ad.value);
        formData.append("address", address.value);
        formData.append("shop", shopName.value);
        formData.append("shop_id", shopId.value);
        formData.append("user_id", userId.value);

        tenantName.addEventListener("input", (e) => {
            formData.append("name", e.target.value);
        })
        phoneNumber.addEventListener("input", (e) => {
            formData.append("phone", e.target.value)
        })
        eb.addEventListener("input", (e) => {
            formData.append("eb", e.target.value);
        })
        ad.addEventListener("input", (e) => {
            formData.append("aadhaar", e.target.value)
        })
        address.addEventListener("input", (e) => {
            formData.append("address", e.target.value);
        })
        shopName.addEventListener("input", (e) => {
            formData.append("shop", e.target.value)
        })

        button.addEventListener("click", () => {
            fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: formData,
            }).then(() => location.reload());
        })
    </script>
</body>

</html>