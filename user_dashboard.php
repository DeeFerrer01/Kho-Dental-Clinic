<?php
session_start();
include('db_connect.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$user_sql = "SELECT name FROM appointments WHERE id = ?";
$user_stmt = $conn->prepare($appointments_sql);
$user_stmt->bind_param("i", $appointments_id);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user_data = $user_result->fetch_assoc();

if (!$user_data) {
    die("User not found.");
}

// Fetch user's appointments
$sql = "SELECT appointments.id, appointments.appointment_date, appointments.appointment_time, services.service_name 
        FROM appointments 
        JOIN services ON appointments.service_id = services.id
        WHERE appointments.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Welcome, <?php echo htmlspecialchars($user_data['name']); ?>!</h2>
        <h4 class="text-center mb-4">My Appointments</h4>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Appointment Date</th>
                    <th>Time</th>
                    <th>Service</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['appointment_date']) . "</td>
                                <td>" . htmlspecialchars($row['appointment_time']) . "</td>
                                <td>" . htmlspecialchars($row['service_name']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No appointments found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
