<?php
session_start();
include 'db_connect.php';

$service_query = "SELECT * FROM services";
$service_result = mysqli_query($conn, $service_query);
if (!$service_result) {
    die("Query failed: " . mysqli_error($conn));
}

$success = false; // Initialize before use

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $service_id = mysqli_real_escape_string($conn, $_POST['service']);
    }
     $insert_query = "INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, service_id) 
                 VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $insert_query);

if ($stmt === false) {
    die("Prepare failed: " . mysqli_error($conn)); // Help diagnose the issue
}

mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $phone, $date, $time, $service_id);
$success = mysqli_stmt_execute($stmt);

if ($success) {
    $appointment_id = mysqli_insert_id($conn);
    $_SESSION['appointment_id'] = $appointment_id;
    header("Location: confirmation.php?appointment_id=" . $appointment_id);
    exit();
} else {
    echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KDC | Appointment Booking</title>
    <style>
        :root {
            --royal-blue-light: hsl(225, 68%, 53%);
            --oxford-blue-1: hsl(218, 70%, 18%);
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: lavender;
        }

        .container {
            display: flex;
            justify-content: center;
            max-width: 900px;
            margin: auto;
            align-items: flex-start;
        }

        .box {
            padding: 20px;
            border-radius: 10px;
            width: 45%;
        }

        .h2 {
            padding-bottom: 10px;

        }
        .h1 {
            text-align: center;
            color:var(--oxford-blue-1);
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #555;
            border-radius: 5px;
            display: block;
            text-align: center;
        }

        input[type="submit"], button {
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            background-color: var(--royal-blue-light);
            color: white;
        }

        input[type="submit"]:hover, button:hover {
            background-color: var(--royal-blue-light);
        }

        .right-form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <h1>Book Your Appointment</h1>
    <div class="container">
        <form action="book.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name" class="form-control" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
            
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" class="form-control" required>
            
            <label for="date">Preferred Date:</label>
            <input type="date" name="date" class="form-control" required>

            <label for="time">Available Reservation Time:</label>
            <select name="time" id="time" class="form-control" required>
                <option value="" selected disabled>Select a Time</option>
                <?php
                    $availableTimes = array();
                    for ($hour = 9; $hour <= 17; $hour++) {
                        $time = sprintf('%02d:00:00', $hour);
                        $availableTimes[] = $time;
                    }

                    foreach ($availableTimes as $time) {
                        echo "<option value='$time'>" . date("h:i A", strtotime($time)) . "</option>";
                    }
                ?>
            </select>

            <label for="service">What type of service are you looking for?</label>
            <select name="service" id="service" class="form-control" required>
                <option value="" selected disabled>Select a Service</option>
                <?php while ($row = mysqli_fetch_assoc($service_result)) { ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php echo htmlspecialchars($row['service_name']); ?>
                    </option>
                <?php } ?>
            </select>

            <input type="submit" value="Book Appointment">
        </form>
    </div>

</body>
</html>

