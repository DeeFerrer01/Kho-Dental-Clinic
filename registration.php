<?php
require "functions.php";
$response =" ";
if(isset($_POST['submit'])){
    $response = registerUser($_POST['email'], $_POST['name'], $_POST['password'], $_POST['confirm_password']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kho Dental Clinic Registration</title>
    <link rel="stylesheet" href="assets/css/style.css">
       <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="form-container">

<div class="cont-main">
      <div class="cont-card">
         <h1>Kho Dental Center</h1>
         <p> Modern Dentistry with gentle care</p>
      </div>

      <div class="cart-body">
         <form action="" method="post">
            <h3>register now</h3>

            <input type="text" name="name"  value="<?php echo @$_POST['name']; ?>"placeholder="Enter your name" required class="box">
            <input type="email" name="email" value="<?php echo @$_POST['email']; ?>" placeholder="Enter your email" required class="box">
            <input type="password" name="password" value="<?php echo @$_POST['password']; ?>" placeholder="Enter your password" required class="box">
            <input type="password" name="confirm_password" value="<?php echo @$_POST['confirm_password']; ?>" placeholder="Confirm your password" required class="box">
            <p>already have an account? <a href="login.php">login now</a></p>
            <input type="submit" name="submit" value="register now" class="btn">


            
            <div class="TermsandConditions">
            <p onclick="tncOpen()" style="cursor: pointer; color: black; font-size: 1.6rem; text-decoration: underline;">Terms and Conditions</p>

            <div id="overlay1" onclick="tncClose()" style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

            <div id="tncmodal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 3rem; border-radius: 1rem; box-shadow: 10px 7px 11px -6px rgba(0,0,0,0.42); z-index: 1000; max-width: 400px;">
                <h2 style="color: #118c4f; font-size: 2.4rem;">Terms and Conditions</h2>
                <p style="list-style: none; padding: 0; margin-top: 1.5rem; font-size: 1.6rem; color: #333;">
                By accessing and using the Dental Appointment System, you agree to comply with these Terms and Conditions. You are responsible for maintaining the confidentiality of your account information and must report any unauthorized use immediately. Your personal data will be collected and used solely for managing appointments in compliance with applicable privacy laws <b>(Data Privacy Act of 2012)</b>. Unauthorized access, fraudulent activity, or any action that compromises system security is strictly prohibited and may result in account suspension or termination. Appointments must be canceled at least 24 hours in advance, and repeated no-shows may lead to restrictions. We are not liable for any damages resulting from system unavailability or misuse. These terms may be updated, and continued use constitutes acceptance of any changes. For any concerns, please contact our support team.
                </p>
                <button id="agree-btn" onclick="agreeToTerms()" style="background-color: #118c4f; color: #fff; padding: 1rem 2rem; margin-top: 2rem; border-radius: .5rem; cursor: pointer;">Agree</button>
                <button id="close-btn" onclick="tncClose()" style="background-color: #c0392b; color: #fff; padding: 1rem 2rem; margin-top: 2rem; border-radius: .5rem; cursor: pointer;">Close</button>
            </div>
            </div>

                    <label style="display: block; margin-top: 2rem; font-size: 1.6rem;">
                    <input type="checkbox" id="termsCheckbox"> I agree to the Terms and Conditions
                    </label>

            <?php
                    if ($response == "success"){
                        ?>
                        <p class="success">Your registration was successful </p>
                        
                        <?php
                         }else{
                        ?>
                        <p class="error"><?php echo $response; ?></p>
                        <?php
                    }    
            ?>
                
        </form>
      </div>
   </div>
         
   
   <script>
function validateForm(event) {
    const termsCheckbox = document.getElementById('termsCheckbox');
    if (!termsCheckbox.checked) {
        alert('You must agree to the Terms and Conditions before registering.');
        event.preventDefault(); // Prevent form submission
    }
}

document.querySelector('form').addEventListener('submit', validateForm);

function tncOpen() {
    document.getElementById('overlay1').style.display = 'block';
    document.getElementById('tncmodal').style.display = 'block';
}

function tncClose() {
    document.getElementById('overlay1').style.display = 'none';
    document.getElementById('tncmodal').style.display = 'none';
}

function agreeToTerms() {
    document.getElementById('termsCheckbox').checked = true;
    alert('You have agreed to the Terms and Conditions.');
    tncClose();
}
</script>

</div>
</body>
</html>