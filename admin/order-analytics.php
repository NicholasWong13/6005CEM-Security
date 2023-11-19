<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <!-- Order Status Chart -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Order Status Chart</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order Status Chart</h6>
            </div>
            <div class="card-body">
                <div style="width: 50%;">
                    <canvas id="orderChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Retrieve order status data
    $sqlStatus = "SELECT order_status, COUNT(*) as status_count FROM orders GROUP BY order_status";
    $resultStatus = mysqli_query($con, $sqlStatus);

    $orderStatusLabels = [];
    $orderStatusCounts = [];

    while ($rowStatus = mysqli_fetch_assoc($resultStatus)) {
        $orderStatusLabels[] = $rowStatus['order_status'];
        $orderStatusCounts[] = $rowStatus['status_count'];
    }
    ?>

    <script>
        // Chart.js code
        var ctx = document.getElementById('orderChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($orderStatusLabels); ?>,
                datasets: [{
                    label: 'Order Counts by Status',
                    data: <?php echo json_encode($orderStatusCounts); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
