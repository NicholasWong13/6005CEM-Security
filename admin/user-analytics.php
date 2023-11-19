
            <!-- Users Chart -->
            <?php
                $stmt = $con->prepare("SELECT COUNT(id) AS total_users, DATE_FORMAT(date_joined, '%Y-%m') AS month_year FROM users GROUP BY DATE_FORMAT(date_joined, '%Y-%m')");
                $stmt->execute();
                $rows_users_chart = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Chart</h6>
                </div>
                <div class="card-body">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // PHP data to JavaScript array
            var usersChartData = <?php echo json_encode($rows_users_chart); ?>;

            // Chart.js
            var ctx = document.getElementById('usersChart').getContext('2d');
            var usersChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: usersChartData.map(item => item.month_year),
                    datasets: [{
                        label: 'Total Users',
                        data: usersChartData.map(item => item.total_users),
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
  
