<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "dental_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
} else{
    echo "<script> alert('Kupal si jomer')</script>";
}
?>
