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