
<?php
include "../control/cus_logi_control.php";
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
  <link rel="stylesheet" href="../css/login.css">

</head>
<body>
  <!-- <header>
    <h1 class="heading-title">Customer Registration</h1>
  </header> -->
  <?php 
    require "../layouts/header.php"
    ?>
  <main>
   
    <div class="login-wrapper">
    <div class="login-container">
      <h2 class="login-title">Log In</h2>
      <form method="post" class="login-form" action="customer_login.php">
        <input type="email" name="email" class="login-input" placeholder="Email" required />
        <input type="password" name="password" class="login-input" placeholder="Password" required />
        <button type="submit" class="login-button">Login</button>
      </form>
      <div class="login-footer">
        have a seller account? <a href="seller_login.php" class="login-register">Login as a seller</a>
      </div>
      <div class="login-footer">
        Don't have account? <a href="customer_registration.php" class="login-register">Register</a>
      </div>

    </div>
  </div>

  </main>

  <?php 
    require "../layouts/footer.php";
  ?>
  <!-- <script src="../js/customer_registration.js"></script> -->
</body>
</html>
