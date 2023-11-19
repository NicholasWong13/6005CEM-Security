<?php
include_once('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status</title>
</head>
<body>

<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch the current status from the database
    $sql = "SELECT account_status FROM users WHERE id = $userId";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['account_status'];

        // Toggle the status (1 to 0 or 0 to 1)
        $newStatus = ($currentStatus == 1) ? 0 : 1;

        // Update the status in the database
        $updateSql = "UPDATE users SET account_status = $newStatus WHERE id = $userId";
        $updateResult = mysqli_query($con, $updateSql);

        if ($updateResult) {
            $updatedStatus = $newStatus; // Get the updated status
            echo json_encode($updatedStatus); // Return the updated status in JSON format
        } else {
            echo "Error updating status: " . mysqli_error($con);
        }
    } else {
        echo "Error fetching current status: " . mysqli_error($con);
    }
} else {
    echo "Invalid user ID.";
}
?>

<!-- Include the JavaScript code -->
<script>
    // Redirect to users.php after editing
    window.location.href = 'users.php';
</script>

</body>
</html>
