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
    <title>Payments</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[80px_1fr_60px] bg-slate-100">
    <?php include "components/header.php"; ?>
    <?php include "components/payments_tenant.php"; ?>
    <?php include "components/footer.php"; ?>
    <?php include "components/new_payment_modal.php"; ?>
    <button class="fixed bottom-32 right-14 font-medium p-4 shadow-lg rounded-full bg-sky-500 mr-2 text-white leading-tight hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-lg transition duration-150 ease-in-out" id="new">
        Add new payment
    </button>
    <script>
        const dialog = document.querySelector("#dialog");
        const cancel = document.querySelector("#cancel");
        const save = document.querySelector("#save");
        const select = document.querySelector("#select");
        const paymentDate = document.querySelector("#payment_date");
        const reference = document.querySelector("#reference");
        const paymentAmount = document.querySelector("#amount");
        const newPayment = document.querySelector("#new");
        const rentId = document.querySelector("#rent_id").value;
        const formData = new FormData();

        formData.append("new_payment", true)
        formData.append("user_id", <?= $_SESSION["user_id"] ?>);
        formData.append("rent_id", rentId);

        select.addEventListener("input", (e) => {
            if (e.target.value == "CASH") {
                reference.disabled = true;
                reference.value = "None";
                formData.append("reference", "none")

            } else {
                reference.disabled = false;
                reference.value = "";
            }
            formData.append("paid_by", e.target.value)
        })

        paymentDate.addEventListener("input", (e) => {
            formData.append("date", e.target.value)
        })

        paymentAmount.addEventListener("input", (e) => {
            formData.append("amount", e.target.value)
        })

        reference.addEventListener("input", (e) => {
            formData.append("reference", e.target.value)
        })

        cancel.addEventListener("click", () => {
            dialog.style.display = "none";
        })

        newPayment.addEventListener("click", () => {
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

</html>