<?php
require "functions.php";

$response = ""; // Initialize response

if (isset($_POST['submit'])) {
    $response = passwordReset($_POST['email']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Reset</title>
</head>
<body>

<h1>Password Reset</h1>
<h4>Please enter your email so we can send you a new password.</h4>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required />
    </div>
    
    <button type="submit" name="submit">Submit</button>
</form>

<p><a href="login.php">Back to login page?</a></p>

<?php
if (!empty($response)) {
    if ($response === "success") {
        echo '<p class="success">Please check your email for your new password.</p>';
    } else {
        echo '<p class="error">' . htmlspecialchars($response) . '</p>';
    }
}
?>

</body>
</html>
