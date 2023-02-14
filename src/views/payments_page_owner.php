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
    <?php include "components/payments_owner.php"; ?>
    <?php include "components/footer.php"; ?>
    <script>
        const acceptButtons = document.querySelectorAll("#accept");
        const disaproveButtons = document.querySelectorAll("#disaprove");
        const formData = new FormData();

        formData.append("edit_payment_status", true);

        acceptButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                formData.append("status", "ACCEPTED");
                formData.append("payment_id", btn.dataset["payment"])
                fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: formData,
            }).then(() => location.reload());
            })
        })
        disaproveButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                formData.append("status", "DECLINED");
                formData.append("payment_id", btn.dataset["payment"])
                fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: formData,
            }).then(() => location.reload());
            })
        })
    </script>
</body>

</html>