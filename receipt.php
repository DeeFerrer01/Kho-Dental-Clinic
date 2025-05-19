<?php
// book.php (partial - add this after successful booking processing)

// Assume you've processed the form and validated the data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data (you should add validation/sanitization here)
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $service_id = (int)$_POST['service'];
    
    // Get service name from database (assuming you have this)
    $service_name = "Unknown Service";
    $service_query = "SELECT service_name FROM services WHERE id = $service_id";
    $service_result = mysqli_query($connection, $service_query);
    if ($row = mysqli_fetch_assoc($service_result)) {
        $service_name = htmlspecialchars($row['service_name']);
    }
    
    // Format the date and time
    $formatted_date = date('F j, Y', strtotime($date));
    $formatted_time = date('h:i A', strtotime($time));
    
    // Generate a booking reference (you might want to save this to database)
    $booking_ref = 'BK-' . strtoupper(substr(md5(uniqid()), 0, 8));
    
    // Display the receipt
    echo <<<RECEIPT
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Confirmation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }
            .receipt-container {
                border: 1px solid #ddd;
                border-radius: 5px;
                padding: 30px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .receipt-header {
                text-align: center;
                margin-bottom: 30px;
            }
            .receipt-title {
                color: #2c3e50;
                margin-bottom: 5px;
            }
            .receipt-ref {
                color: #7f8c8d;
                font-size: 16px;
            }
            .receipt-details {
                margin-bottom: 30px;
            }
            .detail-row {
                display: flex;
                margin-bottom: 10px;
                padding-bottom: 10px;
                border-bottom: 1px dashed #eee;
            }
            .detail-label {
                font-weight: bold;
                width: 200px;
            }
            .thank-you {
                text-align: center;
                font-style: italic;
                margin-top: 30px;
                color: #2c3e50;
            }
            .print-btn {
                display: block;
                width: 200px;
                margin: 30px auto;
                padding: 10px;
                background-color: #3498db;
                color: white;
                text-align: center;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="receipt-container">
            <div class="receipt-header">
                <h1 class="receipt-title">Appointment Booked Successfully!</h1>
                <p class="receipt-ref">Booking Reference: $booking_ref</p>
            </div>
            
            <div class="receipt-details">
                <div class="detail-row">
                    <span class="detail-label">Full Name:</span>
                    <span>$name</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span>$email</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone Number:</span>
                    <span>$phone</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Appointment Date:</span>
                    <span>$formatted_date</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Appointment Time:</span>
                    <span>$formatted_time</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Service:</span>
                    <span>$service_name</span>
                </div>
            </div>
            
            <p class="thank-you">Thank you for booking with us! We look forward to serving you.</p>
            
            <a href="javascript:window.print()" class="print-btn">Print Receipt</a>
        </div>
    </body>
    </html>
RECEIPT;
    
    exit(); // Stop further execution after showing receipt
}
?>