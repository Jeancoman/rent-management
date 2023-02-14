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
    <title>Rent</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[80px_1fr_60px] bg-slate-100">
    <?php include "components/header.php"; ?>
    <?php include "components/rents.php"; ?>
    <?php include "components/footer.php"; ?>
    <?php include "components/rent_edit_modal.php"; ?>
    <?php include "components/new_rent_modal.php"; ?>
    <button>
        <button id="new_rent" class="fixed bottom-32 right-12 z-50 font-medium p-4 shadow-lg rounded-full bg-sky-500 mr-2 text-white leading-tight hover:bg-sky-600 hover:shadow-lg focus:bg-sky-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-700 active:shadow-lg transition duration-150 ease-in-out" id="new">
            Add new rent
        </button>
    </button>
    <script>
        /* Edit and delete rent code */
        const dialog = document.querySelector("#dialog");
        const cancel = document.querySelector("#cancel");
        const edit = document.querySelectorAll("#edit");
        const deleteButtons = document.querySelectorAll("#delete");
        const save = document.querySelector("#save");
        const endDate = document.querySelectorAll("#end_date");
        const totalAmount = document.querySelectorAll("#total_amount");
        const monthlyAmount = document.querySelectorAll("#monthly_amount");
        const endDateInput = document.querySelector("#edit_end");
        const totalInput = document.querySelector("#edit_total");
        const monthlyInput = document.querySelector("#edit_monthly");
        const formData = new FormData();
        let rentId = null;

        formData.append("edit_rent", true);

        cancel.addEventListener("click", () => {
            dialog.style.display = "none";
        })

        endDateInput.addEventListener("input", (e) => {
            formData.append("end_date", e.target.value)
        })

        totalInput.addEventListener("input", (e) => {
            formData.append("total_amount", e.target.value)
        })

        monthlyInput.addEventListener("input", (e) => {
            formData.append("monthly_amount", e.target.value)
        })

        save.addEventListener("click", () => {
            fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: formData,
            }).then(() => location.reload());
        })

        edit.forEach((btn) => {
            btn.addEventListener("click", () => {
                dialog.style.display = "flex";
                rentId = btn.dataset["rent"];
                formData.append("rent_id", rentId);
                endDate.forEach((e) => {
                    if (rentId == e.dataset["rent"]) {
                        endDateInput.value = e.innerHTML;
                        formData.append("end_date", endDateInput.value)
                    }
                })
                totalAmount.forEach((e) => {
                    if (rentId == e.dataset["rent"]) {
                        totalInput.value = e.innerHTML;
                        formData.append("total_amount", totalInput.value);
                    }
                })
                monthlyAmount.forEach((e) => {
                    if (rentId == e.dataset["rent"]) {
                        monthlyInput.value = e.innerHTML;
                        formData.append("monthly_amount", monthlyInput.value)
                    }
                })
            })
        })
        deleteButtons.forEach((btn) => {
            btn.addEventListener("click", () => {
                rentId = btn.dataset["rent"];
                formData.append("rent_id", rentId);
                formData.append("delete_rent", rentId);
                fetch("../handlers/form_post_handler.php", {
                    method: "POST",
                    body: formData,
                }).then(() => location.reload());
            })
        })
        /* Edit and rent code*/

        /* New rent code*/
        const newDialog = document.querySelector("#new_dialog");
        const newCancel = document.querySelector("#new_cancel");
        const saveRent = document.querySelector("#save_rent");
        const open = document.querySelector("#new_rent");
        const newFormData = new FormData();
        const newInitialDate = document.querySelector("#new_initial_date");
        const newEndDate = document.querySelector("#new_end_date");
        const selectUser = document.querySelector("#select_user");
        const newTotalAmount = document.querySelector("#new_total_amount");
        const newMonthlyAmount = document.querySelector("#new_monthly_amount");

        newFormData.append("new_rent", true);

        newInitialDate.addEventListener("input", (e) => {
            newFormData.append("initial_date", e.target.value)
        })

        newEndDate.addEventListener("input", (e) => {
            newFormData.append("end_date", e.target.value)
        })

        selectUser.addEventListener("input", (e) => {
            newFormData.append("user_id", e.target.value)
        })

        newTotalAmount.addEventListener("input", (e) => {
            newFormData.append("total_amount", e.target.value)
        })

        newMonthlyAmount.addEventListener("input", (e) => {
            newFormData.append("monthly_amount", e.target.value)
        })

        newCancel.addEventListener("click", () => {
            newDialog.style.display = "none";
        })

        open.addEventListener("click", () => {
            newDialog.style.display = "flex";
        })

        saveRent.addEventListener("click", () => {
            fetch("../handlers/form_post_handler.php", {
                method: "POST",
                body: newFormData,
            }).then(() => location.reload());
        })
        /* New rent code*/
    </script>
</body>

</html>