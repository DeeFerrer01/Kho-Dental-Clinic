<?php
session_start();
include 'db_connect.php';

if (!isset($_GET['appointment_id']) || !isset($_SESSION['receipt_content'])) {
    die("Invalid request");
}

$appointment_id = $_GET['appointment_id'];
$receiptContent = $_SESSION['receipt_content'];
unset($_SESSION['receipt_content']);

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="receipt_' . $appointment_id . '.txt"');
echo $receiptContent;
exit();
?>