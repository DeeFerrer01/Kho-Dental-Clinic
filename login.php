<?php
require("functions.php");

$response = "";  // Initialize the response variable to avoid undefined variable errors

if (isset($_POST['submit'])) {
    // Call the loginUser function with the provided username and password
    $response = loginUser($_POST['username'], $_POST['password']);
}

if(isset($_GET['register'])){
   registerNow();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="form-container">
<div class="cont-main">
   <div class="cont-card">
      <h1>Kho Dental Center</h1>
      <p>Modern Dentistry with gentle care</p>
   </div>

   <div class="cart-body">
      <form action="" method="post">
         <h3>login now</h3>
         <!-- Correct the input type for the username to "text" -->
         <input type="text" name="username" placeholder="Enter your Username" value="<?php echo $_POST['username'] ?? ''; ?>" required class="box">
         <input type="password" name="password" placeholder="Enter your password" value="<?php echo $_POST['password'] ?? ''; ?>" required class="box">
         <p> Don't have an account? <input type="submit" value="" name="register"> <a href="registration.php">Register now</a></p>    
          <input type="submit" name="submit" value="login now" class="btn">
         <p><a href="">Forgot password?</a></p>
    
         <button type="button" onclick="openModal()" class="security-btn" style="background-color: var(--royal-blue-light);
; color: #fff; padding: 1rem 1rem; border-radius: .5rem; cursor: pointer; border: none;">Security Tips</button>

<div id="overlay" onclick="closeModal()" style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"></div>      

<div id="modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 3rem; border-radius: 1rem; box-shadow: 10px 7px 11px -6px rgba(0,0,0,0.42); z-index: 1000; max-width: 400px;">
  <h2 style="color: #cc5fa8; font-size: 2.4rem;">Security Tips</h2>
  <ul style="list-style: none; padding: 0; margin-top: 1.5rem; font-size: 1.6rem; color: #333;">
    <li style="margin-bottom: 1rem;">Never share your password or login credentials with anyone.</li>
    <li style="margin-bottom: 1rem;">Log out from your account when using public or shared devices.</li>
    <li style="margin-bottom: 1rem;">Enable two-factor authentication (2FA) for extra security.</li>
    <li style="margin-bottom: 1rem;">Log out your account after using the website.</li>
  </ul>
  <button id="close-btn" onclick="closeModal()" style="background-color: #c0392b; color: #fff; padding: 1rem 2rem; margin-top: 2rem; border-radius: .5rem; cursor: pointer;">Close</button>
</div>



<script>
function openModal() {
  document.getElementById('modal').style.display = 'block';
  document.getElementById('overlay').style.display = 'block';
}

function closeModal() {
  document.getElementById('modal').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
}

function tncOpen() {
  document.getElementById('tncmodal').style.display = 'block';
  document.getElementById('overlay1').style.display = 'block';
}

function tncClose() {
  document.getElementById('tncmodal').style.display = 'none';
  document.getElementById('overlay1').style.display = 'none';
}

function agreeToTerms() {
  document.getElementById('termsCheckbox').checked = true;
  alert('You have agreed to the Terms and Conditions.');
  tncClose();
}
</script>


        
        
        
        
        
        
        
        
        <!-- Display the response only if it's set -->
         <?php if (!empty($response)) { ?>
             <p class="error"><?php echo $response; ?></p>
         <?php } ?>
      </form>
   </div>
</div>
</div>



</body>
</html>
