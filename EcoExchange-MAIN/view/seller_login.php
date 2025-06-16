<?php
session_start();
// Redirect if already logged in
if (isset($_SESSION['seller_id'])) {
    header("Location: seller_profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seller Login</title>
    <link rel="stylesheet" href="../css/seller_panel.css">
</head>
<body>
  <?php require "../layouts/header.php"; ?>

    <div class="login-container">
        <h1>Seller Login</h1>
        
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
        <?php endif; ?>
        
        <form method="post" action="../control/seller_login_control.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="seller-registration.php">Register here</a>
        <p>or</p>
        <a href="../view/customer_login.php">Login as Customer</a>


    </div>
  <?php require "../layouts/footer.php"; ?>

</body>
</html>