<?php
require "../control/seller_profile_control.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seller Profile</title>
    <link rel="stylesheet" href="../css/seller_panel.css">
</head>
<body>
    <?php require "../layouts/header.php"; ?>

    <div class="profile-container">
        <h1>Seller Profile - <?php echo htmlspecialchars($_SESSION['business_name']); ?></h1>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <div class="profile-info">
            <form method="post">
                <div class="form-group">
                    <label>Business Name:</label>
                    <input type="text" name="business_name" value="<?php echo htmlspecialchars($seller['business_name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Contact Email:</label>
                    <input type="email" name="contact_email" value="<?php echo htmlspecialchars($seller['contact_email']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Contact Phone:</label>
                    <input type="tel" name="contact_phone" value="<?php echo htmlspecialchars($seller['contact_phone']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Business Address:</label>
                    <textarea name="business_address" required><?php echo htmlspecialchars($seller['business_address']); ?></textarea>
                </div>
                
                <button type="submit" name="update">Update Profile</button>
            </form>
        </div>

        <div class="delete-account">
    <form method="post" onsubmit="return confirm('Are you sure you want to permanently delete your account? This cannot be undone!')">
        <h3>Delete Account</h3>
        <div class="form-group">
            <label>Enter Password to Confirm:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="delete" class="delete-btn">Delete My Account</button>
    </form>
    
</div>
        <div class="logout">
            <a href="seller_logout.php">Logout</a>
        </div>
    </div>
    <?php require "../layouts/footer.php"; ?>
</body>
</html>