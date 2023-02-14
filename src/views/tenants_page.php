<?php 

if(!$_SESSION["user_id"]){
    header("location:/login");
    exit();
}

if($_SESSION["user_type"] == "TENANT"){
    header("location:/");
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenants</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[80px_1fr_60px] bg-slate-100">
    <?php include "components/header.php"; ?>
    <?php include "components/tenants.php"; ?>
    <?php include "components/footer.php"; ?>
    <?php include "components/new_tenant_modal.php"; ?>
    <button>
        <button class="fixed bottom-32 right-12 z-50 font-medium p-4 shadow-lg rounded-full bg-sky-500 mr-2 text-white leading-tight hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-lg transition duration-150 ease-in-out" id="new">
            Add new tenant
        </button>
    </button>
    <script>
        const dialog = document.querySelector("#dialog");
        const cancel = document.querySelector("#cancel");
        const save = document.querySelector("#save");
        const open = document.querySelector("#new");
        const tenantName = document.querySelector("#name");
        const phone = document.querySelector("#phone");
        const password = document.querySelector("#password");
        const formData = new FormData();

        formData.append("new_tenant", true);

        tenantName.addEventListener("input", (e) => {
            formData.append("name", e.target.value)
        })

        phone.addEventListener("input", (e) => {
            formData.append("phone_number", e.target.value)
        })

        password.addEventListener("input", (e) => {
            formData.append("password", e.target.value)
        })

        cancel.addEventListener("click", () => {
            dialog.style.display = "none";
        })

        open.addEventListener("click", () => {
            dialog.style.display = "flex";
        })

        save.addEventListener("click", () => {
            fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: formData,
            }).then(() => location.reload());
        })
    </script>
</body>
</body>

</html>