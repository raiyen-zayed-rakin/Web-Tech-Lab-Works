<?php
session_start();
require "../model/db.php";

// Check if seller is logged in
if (!isset($_SESSION['seller_id'])) {
    header("Location: seller_login.php");
    exit();
}

// Get seller data using prepared statement
$conn = createCon();
$seller_id = $_SESSION['seller_id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM sellers WHERE seller_id=?");
mysqli_stmt_bind_param($stmt, "i", $seller_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$seller = mysqli_fetch_assoc($result);

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $businessName = htmlspecialchars($_POST['business_name']);
    $contactEmail = htmlspecialchars($_POST['contact_email']);
    $contactPhone = htmlspecialchars($_POST['contact_phone']);
    $businessAddress = htmlspecialchars($_POST['business_address']);
    
    $sql = "UPDATE sellers SET 
            business_name = ?,
            contact_email = ?,
            contact_phone = ?,
            business_address = ?
            WHERE seller_id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $businessName, $contactEmail, $contactPhone, $businessAddress, $seller_id);
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $_SESSION['message'] = "Profile updated successfully";
        $_SESSION['business_name'] = $businessName;
        header("Location: seller_profile.php");
        exit();
    } else {
        $_SESSION['error'] = "Error updating profile: " . mysqli_error($conn);
    }
}

closeCon($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Profile</title>
    <link rel="stylesheet" href="../css/seller_panel.css">
</head>
<body>
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
        
        <div class="logout">
            <a href="seller_logout.php">Logout</a>
        </div>
    </div>
</body>
</html>