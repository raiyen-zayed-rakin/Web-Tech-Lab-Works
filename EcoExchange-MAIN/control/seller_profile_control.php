<?php
session_start();
require "../model/db.php";

// Check if seller is logged in
if (!isset($_SESSION['seller_id'])) {
    header("Location: seller_login.php");
    exit();
}

$conn = createCon();
$seller_id = $_SESSION['seller_id'];
$seller = getSellerById($conn, $seller_id);

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $businessName = htmlspecialchars($_POST['business_name']);
    $contactEmail = htmlspecialchars($_POST['contact_email']);
    $contactPhone = htmlspecialchars($_POST['contact_phone']);
    $businessAddress = htmlspecialchars($_POST['business_address']);
    
    if (updateSellerProfile($conn, $seller_id, $businessName, $contactEmail, $contactPhone, $businessAddress)) {
        $_SESSION['message'] = "Profile updated successfully";
        $_SESSION['business_name'] = $businessName;
        header("Location: seller_profile.php");
        exit();
    } else {
        $_SESSION['error'] = "Error updating profile: " . mysqli_error($conn);
    }
}

// Handle profile deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $password = trim($_POST['password'] ?? '');
    
    if (empty($password)) {
        $_SESSION['error'] = "Password is required";
        header("Location: seller_profile.php");
        exit();
    }
    
    if (verifySellerPassword($conn, $seller_id, $password)) {
        mysqli_begin_transaction($conn);
        try {
            if (deleteSeller($conn, $seller_id)) {
                mysqli_commit($conn);
                session_destroy();
                header("Location: ../view/seller_login.php?deleted=1");
                exit();
            }
        } catch (Exception $e) {
            mysqli_rollback($conn);
            $_SESSION['error'] = "Deletion failed: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Incorrect password";
    }
}

closeCon($conn);
?>