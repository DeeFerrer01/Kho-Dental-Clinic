<?php
require "config.php";

function connect() {
    // Create a new connection to the database
    $mysqli = new mysqli('localhost', 'root', '', 'dental_db');
    
    // Check if there is a connection error
    if ($mysqli->connect_errno != 0) {
        $error_date = date("F j, Y, g:i a");  // Correct date format
        $message = "Error: {$mysqli->connect_error} | Date: {$error_date} \r\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);  // Correct file path
        return false;
    } else {
        return $mysqli;
    }
}

function registerUser($email, $username, $password, $confirm_password) {
    // Get the database connection
    $mysqli = connect();
    if (!$mysqli) {
        return "Database connection failed";
    }

    // Use func_get_args() to get all arguments passed to the function
    $args = func_get_args();

    // Trim all arguments (remove extra spaces)
    $args = array_map(function($value) {
        return trim($value);
    }, $args);

    // Check if any argument is empty
    foreach ($args as $value) {
        if (empty($value)) {
            return "All fields are required";
        }
    }

    // Check for invalid characters in the fields
    foreach ($args as $value) {
        if (preg_match("/[<>]/", $value)) {  // Corrected regex to match < or >
            return "<> characters are not allowed";
        }
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email is not valid";
    }

    // Prepare a query to check if the email already exists
    $stmt = $mysqli->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);  // Corrected binding
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Check if the email already exists
    if ($data != NULL) {
        return "Email already exists, please use a different email";
    }

    // Check if the username is too long
    if (strlen($username) > 50) {
        return "Username is too long";
    }

    // Check if the password is too long
    if (strlen($password) > 50) {
        return "Password is too long";
    }

    // Check if the passwords match
    if ($password != $confirm_password) {
        return "Passwords don't match";
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the query to insert the user into the database
    $stmt = $mysqli->prepare("INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);  // Corrected the parameters

    // Execute the query and check if it was successful
    $stmt->execute();
    if ($stmt->affected_rows != 1) {
        return "An error occurred. Please try again";
    } else {
        return "success";
    }
}

function loginUser($username, $password) {
    $mysqli = connect();
    
    // Check if the connection was successful
    if ($mysqli === false) {
        return "Database connection failed.";
    }

    // Trim input values to remove leading and trailing spaces
    $username = trim($username);
    $password = trim($password);

    // Check if fields are empty
    if ($username == "" || $password == "") {
        return "Both fields are required";
    }

    // Sanitize the username but not the password (no need to sanitize passwords)
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    // Prepare the SQL statement
    $sql = "SELECT name, password FROM users WHERE name = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind parameters and execute the statement
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        // Get the result and check if the user exists
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        // Check if user was found and password is correct
        if ($data == NULL || !password_verify($password, $data["password"])) {
            return "Wrong username or password";
        } else {
            // Successful login: set session and redirect to account page
            $_SESSION["user"] = $username;  // Fixed typo: $_SESSON to $_SESSION
            header("Location: index.php");
            exit();
        }
    } else {
        return "Error preparing the statement.";
    }
}

function logoutUser(){
    session_destroy();
    header("Location:login.php");
    exit();
}

function registerNow(){
    session_start();
    header("Location:registration.php");
    exit();
}
function passwordReset($email) {
    $mysqli = connect();
    $email = trim($email);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email is not valid";
    }

    // Check if the email exists
    $stmt = $mysqli->prepare("SELECT email FROM users WHERE email = ?");
    if (!$stmt) {
        return "Database error: Failed to prepare statement.";
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data == NULL) {
        return "Email doesn't exist in the database.";
    }

    // Generate a random password
    $str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $password_length = 7;
    $shuffled_str = str_shuffle($str);
    $new_pass = substr($shuffled_str, 0, $password_length);

    // Send the email
    $subject = "Password Recovery";
    $body = "You can log in with your new password: " . $new_pass;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Admin\r\n";

    $send = mail($email, $subject, $body, $headers);
    if (!$send) {
        return "Email not sent. Please try again.";
    }

    // Update password in the database
    $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE email = ?");
    if (!$stmt) {
        return "Database error: Failed to prepare update statement.";
    }
    $stmt->bind_param("ss", $hashed_password, $email);
    $stmt->execute();

    if ($stmt->affected_rows != 1) {
        return "There was a connection error, please try again.";
    }

    return "success";
}







?>
