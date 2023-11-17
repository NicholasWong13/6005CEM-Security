<?php
    session_start();

    // Page Title
    $pageTitle = 'Analytics';

    // Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    // Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Analytics Overview</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a>
            </div>

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
  
<?php 
        
        // Include Footer
        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: login.php');
        exit();
    }
?>
