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
    } else
     {
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
    
    // Verify password
    $stmt = mysqli_prepare($conn, "SELECT password_hash FROM sellers WHERE seller_id=?");
    mysqli_stmt_bind_param($stmt, "i", $seller_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $seller = mysqli_fetch_assoc($result);
    
    if ($seller && password_verify($password, $seller['password_hash'])) {
        // Start transaction for atomic operation
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