    <?php 
    // Database Connection
    $host = "localhost";
    $user = "root"; 
    $password = ""; 
    $database = "dental_db";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("<p style='color:red;'>Database Connection Failed: " . $conn->connect_error . "</p>");
    }

    // Debug: Check if appointment_id is set
    if (!isset($_GET['appointment_id']) || empty($_GET['appointment_id'])) {
        die("<p style='color:red;'>Error: No appointment ID provided in the URL.</p>");
    } else {
        //echo "<p style='color:green;'>Debug: appointment_id received = " . htmlspecialchars($_GET['appointment_id']) . "</p>";
    } 

    $appointment_id = intval($_GET['appointment_id']); // Ensure it's a number
    $appointment = null;

    $query = "SELECT a.*, s.service_name 
            FROM appointments a 
            JOIN services s ON a.service_id = s.id 
            WHERE a.id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointment_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $appointment = $result->fetch_assoc();
        } else {
            die("<p style='color:red;'>Error: No appointment found for ID $appointment_id.</p>");
        }
    } else {
        die("<p style='color:red;'>SQL Execution Error: " . $stmt->error . "</p>");
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KDC | Appointment Confirmation</title>
        <link rel="shortcut icon" href="./images/KDC logo.jpg" type="image/svg+xml">
    </head>
    <style>
        :root {
                --royal-blue-light: hsl(225, 68%, 53%);
                --oxford-blue-1: hsl(218, 70%, 18%);
            }
        body {
            font-family: Arial, sans-serif;
            background-color: #lavender;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: var(--oxford-blue-1);

        }
        h3 {
            color: var(--oxford-blue-1);

        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        button {
            background-color: var(--royal-blue-light);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
          .no-print {
        display: inline-block;
    }

    @media print {
        .no-print {
            display: none !important;
        }
    }
    </style>
    <body>

        <div class="container" id="receipt">

            <h2>Appointment Confirmed</h2>

            <?php if ($appointment): ?>
                <p>Thank you, <b><?php echo htmlspecialchars($appointment['name'] ?? 'Guest'); ?></b>!</p>
                <p>Your dental appointment is scheduled for:</p>
                
                <h3><?php 
                    echo !empty($appointment[           'appointment_date']) 
                        ? date("F j, Y", strtotime($appointment['appointment_date'])) 
                        : "Date not set"; 
                ?> at <?php 
                    echo !empty($appointment['appointment_time']) 
                        ? date("h:i A", strtotime($appointment['appointment_time'])) 
                        : "Time not set"; 
                ?></h3>

                <p>Location: Cato, Infanta Pangasinan</p>
                <p>Contact: +63 961 2468 749</p>
                <p>Service Selected: <b><?php echo htmlspecialchars($appointment['service_name'] ?? 'Not specified'); ?></b></p>
                <p>Check your email (<b><?php echo htmlspecialchars($appointment['email'] ?? 'No email'); ?></b>) for further details.</p>
            <?php else: ?>
                <p style="color: red;">Error: Appointment details not found.</p>
            <?php endif; ?>


            <a href="index.php"><button class="no-print">Back to Home</button></a>
<button class="no-print" onclick="downloadReceipt()">Download Receipt</button>


        </div>

    </body>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function downloadReceipt() {    
    const element = document.getElementById('receipt');
    const buttons = document.querySelectorAll('.no-print');

    // Hide buttons before generating PDF
    buttons.forEach(btn => btn.style.display = 'none');

    // Generate PDF
    html2pdf().from(element).save('KDC_Appointment_Receipt.pdf').then(() => {
        // Show buttons again after PDF is created
        buttons.forEach(btn => btn.style.display = 'inline-block');
    });
}
</script>

</script>

    </html>
