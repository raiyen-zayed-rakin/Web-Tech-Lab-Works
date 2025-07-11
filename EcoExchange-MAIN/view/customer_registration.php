
<?php
include "../control/cus_regi_control.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Registration</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/customer_registration.css">

</head>
<body>
  <!-- <header>
    <h1 class="heading-title">Customer Registration</h1>
  </header> -->
  <?php 
    require "../layouts/header.php"
    ?>
  <main>
    <form class="info-box" action="customer_registration.php" target="_self" method="post" id="registration-form">
      <div class="name-section">
        <div class="fname-section">
          <label for="fname">First Name<span>*</span></label>
          <input class="input-box" id="fname" name="fname" type="text" placeholder="Enter first name" />
          <span class="error-message" id="fname-error"></span>
        </div>
        <div class="lname-section">
          <label for="lname">Last Name<span>*</span></label>
          <input class="input-box" id="lname" name="lname" type="text" placeholder="Enter last name" />
          <span class="error-message" id="lname-error"></span>
        </div>
      </div>
    
      <label for="email">Email Address<span>*</span></label>
      <input class="input-box" id="email" name="email" type="email" placeholder="Enter email address" />
      <span class="error-message" id="email-error"></span>
    
      <label for="phone">Phone Number<span>*</span></label>
      <input class="input-box" id="phone" name="phone" type="tel" placeholder="Enter phone number" />
      <span class="error-message" id="phone-error"></span>
    
      <div class="dob-gender-section">
        <div>
          <label for="dob">Date of Birth<span>*</span></label>
          <input class="date-box" id="dob" name="dob" type="date" />
          <span class="error-message" id="dob-error"></span>
        </div>
        <div>
          <label for="gender">Gender<span>*</span></label>
          <select class="input-box" id="gender" name="gender">
            <option value="" disabled selected>Select gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <span class="error-message" id="gender-error"></span>
        </div>
      </div>
    
      <label for="address">Current Address<span>*</span></label>
      <input class="input-box" id="address" name="address" type="text" placeholder="Enter address" />
      <span class="error-message" id="address-error"></span>
    
      <label for="username">Create Username<span>*</span></label>
      <input class="input-box" id="username" name="username" type="text" placeholder="Enter username" />
      <span class="error-message" id="username-error"></span>
    
      <div class="own-work-radio">
        <div>
          <label>Own or work in a restaurant business:</label>
        </div>
        <div class="radio-options">
          <input type="radio" id="restaurant-yes" name="restaurant" value="yes" />
          <label for="restaurant-yes">Yes</label>
          <input type="radio" id="restaurant-no" name="restaurant" value="no" />
          <label for="restaurant-no">No</label>
        </div>
        <span class="error-message" id="restaurant-error"></span>
      </div>
    
      <div class="password-section">
        <div class="pass-section">
          <label for="password">Password<span>*</span></label>
          <input class="input-box" id="password" name="password" type="password" placeholder="Enter password" />
          <span class="error-message" id="password-error"></span>
        </div>
        <div class="confirm-pass-section">
          <label for="confirm-password">Confirm Password<span>*</span></label>
          <input class="input-box" id="confirm-password" name="confirm-password" type="password" placeholder="Re-enter password" />
          <span class="error-message" id="confirm-password-error"></span>
        </div>
      </div>
    
      <div class="btn-section">
        <input class="btn reset-fields-btn" type="reset" value="Reset Fields" />
        <input class="btn create-account-btn" type="submit" value="Create Account" />
      </div>
      <div class="login-footer">
        Want be a seller? <a href="seller-registration.php" class="login-register">Register as a seller</a>
      </div>
      <div class="login-footer">
        Already have an account? <a href="customer_login.php" class="login-register">Login</a>
      </div>
</form>
      
  </main>

  <?php 
    require "../layouts/footer.php";
  ?>
  <script src="../js/customer_registration.js"></script>
</body>
</html>
