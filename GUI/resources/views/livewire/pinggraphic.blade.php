<div>
    <div class="rounded-lg overflow-hidden">
        <canvas class="p-10" id="chartLine"></canvas>
    </div>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart line -->
    <script>
    // const labels = ["January", "February", "March", "April", "May", "June"];
    const labels = ["00:00", "01:00", "02:00", "03:00", "04:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"];
    const data = {
        labels: labels,
        datasets: [
        {
            label: "Ping Time",
            backgroundColor: "hsl(217, 91.2%, 59.8%)",
            borderColor: "hsl(217, 91.2%, 59.8%)",
            data: [20.0, 21.3, 20.2, 20.1, 27, , 23.2, 20.3, 20.0, 21.3, 20.2, 20.1, 20.0, 21.2, 23.2, 20.3, 20.0, 21.3, 20.2, 20.1, 23.2, 20.3, 23.1, 20.2],
        },
        ],
    };

    const configLineChart = {
        type: "line",
        data,
        options: {},
    };

    var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );
    </script>
</div>
