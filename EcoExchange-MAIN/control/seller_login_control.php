<?php
session_start();
require "../model/db.php";

// Redirect if already logged in
if (isset($_SESSION['seller_id'])) {
    header("Location: ../view/seller_profile.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (empty($username) || empty($password)) {
        $_SESSION['login_error'] = "Username and password are required";
        header("Location: ../view/seller_login.php");
        exit();
    }
    
    $conn = createCon();
    
    // Verify seller credentials
    $sql = "SELECT seller_id, username, business_name, password_hash FROM sellers WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        $seller = mysqli_fetch_assoc($result);
        if (password_verify($password, $seller['password_hash'])) {
            // Login successful
            $_SESSION['seller_id'] = $seller['seller_id'];
            $_SESSION['username'] = $seller['username'];
            $_SESSION['business_name'] = $seller['business_name'];
            mysqli_close($conn);
            header("Location: ../view/seller_profile.php");
            exit();
        }
    }
    
    // Login failed
    mysqli_close($conn);
    $_SESSION['login_error'] = "Invalid username or password";
    header("Location: ../view/seller_login.php");
    exit();
}
?>