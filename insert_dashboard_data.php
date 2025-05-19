<?php
include('db_connect.php');

// Ensure an ID is received
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid ID.");
}

$appointment_id = intval($_GET['id']);

// Fetch appointment details
$sql = "SELECT appointments.id, appointments.name, appointments.email, appointments.phone, appointments.appointment_date, appointments.appointment_time, services.service_name 
        FROM appointments 
        JOIN services ON appointments.service_id = services.id
        WHERE appointments.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $appointment_id);
$stmt->execute();
$result = $stmt->get_result();
$appointment = $result->fetch_assoc();

if (!$appointment) {
    die("Appointment not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dashboard_data = $_POST['dashboard_data'];

    $insert_sql = "INSERT INTO dashboard (appointment_id, dashboard_data) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("is", $appointment_id, $dashboard_data);

    if ($insert_stmt->execute()) {
        echo "<p>Data successfully added to the dashboard.</p>";
    } else {
        echo "<p>Error inserting data: " . $conn->error . "</p>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Dashboard Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <h2 class="text-center mb-5">Insert Data for Appointment #<?php echo htmlspecialchars($appointment['id']); ?></h2>

        <form method="POST">
            <div class="mb-3">
                <label for="dashboard_data" class="form-label">Dashboard Data</label>
                <textarea class="form-control" id="dashboard_data" name="dashboard_data" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
