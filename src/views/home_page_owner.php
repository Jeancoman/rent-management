<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body class="min-h-screen grid grid-rows-[80px_1fr_60px] grid-cols-1 bg-slate-100">
    <?php include "components/header.php"; ?>
    <?php include "components/home_owner.php"; ?>
    <?php include "components/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labelsBarChart = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "Octuber",
            "November",
            "December"
        ];
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "Rent by month, 2023",
                backgroundColor: "#0284be",
                borderColor: "blue",
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>
</body>

</html>