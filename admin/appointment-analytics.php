<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
    // Query for total appointments
    $stmtTotalAppointments = $con->prepare("SELECT COUNT(*) as total FROM appointments");
    $stmtTotalAppointments->execute();
    $totalAppointments = $stmtTotalAppointments->fetchColumn();

    // Query for upcoming appointments
    $stmtUpcomingAppointments = $con->prepare("SELECT COUNT(*) as upcoming FROM appointments WHERE start_time >= ?");
    $stmtUpcomingAppointments->execute(array(date('Y-m-d H:i:s')));
    $upcomingAppointments = $stmtUpcomingAppointments->fetchColumn();

    // Query for canceled appointments
    $stmtCanceledAppointments = $con->prepare("SELECT COUNT(*) as canceled FROM appointments WHERE canceled = 1");
    $stmtCanceledAppointments->execute();
    $canceledAppointments = $stmtCanceledAppointments->fetchColumn();
    ?>

    <div class="card shadow mb-4" style="width: 50%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Appointment Analytics</h6>
        </div>
        <div class="card-body">
            <canvas id="appointmentChart"></canvas>
        </div>
    </div>

    <script>
        // PHP data to JavaScript array
        var appointmentChartData = [<?php echo $totalAppointments; ?>, <?php echo $upcomingAppointments; ?>, <?php echo $canceledAppointments; ?>];

        // Chart.js
        var ctx = document.getElementById('appointmentChart').getContext('2d');
        var appointmentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Appointments', 'Upcoming Appointments', 'Canceled Appointments'],
                datasets: [{
                    label: 'Number of Appointments',
                    data: appointmentChartData,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
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
