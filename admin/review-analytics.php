<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    try {
        $stmt = $con->prepare("SELECT AVG(user_rating) AS average_rating, DATE_FORMAT(datetime, '%Y') AS year FROM review_table GROUP BY year");
        $stmt->execute();
        $rows_feedback_chart = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Review Analytics</h6>
        </div>
        <div class="card-body">
            <canvas id="feedbackChart"></canvas>
        </div>
    </div>

    <script>
        var feedbackChartData = <?php echo json_encode($rows_feedback_chart); ?>;

        if (Array.isArray(feedbackChartData) && feedbackChartData.length > 0) {
            var labels = feedbackChartData.map(item => item.year);
            var data = feedbackChartData.map(item => item.average_rating);

            var ctx = document.getElementById('feedbackChart').getContext('2d');
            var feedbackChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Average Rating',
                        data: data,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true,
                            max: 5 
                        }
                    }
                }
            });
        } else {
            console.log('No data available for the chart.');
        }
    </script>

</body>

</html>
