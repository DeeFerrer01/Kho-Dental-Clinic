<?php
include('db_connect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        tr.clickable-row { cursor: pointer; }
    </style>
  </head>
  <body>

   <div class="container-fluid">
    <div class="row" style="height:100vh;">
        <div class="col-2 col-sm-3 col-xl-2 bg-dark">
            <nav class="navbar bg-dark border-bottom border-white mb-3" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <i class="bi bi-house-door"></i>
                        <span class="d-none d-sm-inline ms-2">Kho-Dental Center</span>
                    </a>
                </div>
            </nav>

            <nav class="nav flex-column">
                <a class="nav-link text-white" href="dashboard.php">
                    <i class="bi bi-speedometer2"></i>
                    <span class="d-none d-sm-inline ms-2">Dashboard</span>
                </a>
                <a class="nav-link text-white" href="appointments.php">
                    <i class="bi bi-cash-coin"></i>
                    <span class="d-none d-sm-inline ms-2">Appointments</span>
                </a>
                <a class="nav-link text-white" href="user_dashboard.php">
                    <i class="bi bi-person-circle"></i>
                    <span class="d-none d-sm-inline ms-2">User</span>
                </a>
            </nav>
        </div>
        <div class="col-10 col-sm-9 col-xl-10 p-0 m-0">
            <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
                <div class="container-fluid">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="adminlogout.php">
                                <i class="bi bi-arrow-bar-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
                <div class="px-3">
                    <h2 class="text-center mb-5">Appointments</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Preferred Date</th>
                                    <th>Appointment Time</th>
                                    <th>Service</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT appointments.id, appointments.name, appointments.email, appointments.phone, appointments.appointment_date, appointments.appointment_time, services.service_name 
                                        FROM appointments 
                                        JOIN services ON appointments.service_id = services.id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='clickable-row' data-href='insert_dashboard_data.php?id=" . htmlspecialchars($row['id']) . "'>
                                                <td>" . htmlspecialchars($row['id']) . "</td>
                                                <td>" . htmlspecialchars($row['name']) . "</td>
                                                <td>" . htmlspecialchars($row['email']) . "</td>
                                                <td>" . htmlspecialchars($row['phone']) . "</td>
                                                <td>" . htmlspecialchars($row['appointment_date']) . "</td>
                                                <td>" . htmlspecialchars($row['appointment_time']) . "</td>
                                                <td>" . htmlspecialchars($row['service_name']) . "</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>No clients found</td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let rows = document.querySelectorAll(".clickable-row");
            rows.forEach(row => {
                row.addEventListener("click", function() {
                    window.location.href = row.dataset.href;
                });
            });
        });
    </script>
  </body>
</html>
