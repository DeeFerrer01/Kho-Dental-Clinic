<?php
require("functions.php");
if(!isset(($_SESSION["user"]))){
    header("location: login.php");
    exit();
}
if(isset($_GET['logout'])){
    logoutUser();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="page">
        <h2> Welcome <?php echo $_SESSION["user"]?> </h2>
        <h4> This is a secure page </h4>
        
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse at, repellat ullam perferendis expedita delectus? Tempora, porro obcaecati. Vel et quo perspiciatis non sed, ducimus delectus amet reprehenderit dolores mollitia.
        </p>
        
        <a href="?logout">Logout</a>
        <br>
        <a href="?delete-account">Delete Account</a>
    </div>
</body>
</html>