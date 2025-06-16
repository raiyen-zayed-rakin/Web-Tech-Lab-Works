<?php
session_start();
// seller_login_control.php
require_once '../model/db.php';

$conn = createCon();
$loginResult = verifySellerLogin($conn, $_POST['username'], $_POST['password']);

if (isset($loginResult['success'])) {
    $_SESSION['seller_id'] = $loginResult['seller_id'];
    $_SESSION['username'] = $loginResult['username'];
    $_SESSION['business_name'] = $loginResult['business_name'];
    header("Location: ../view/home.php");
    exit();
} else {
    $_SESSION['login_error'] = $loginResult['error'];
    header("Location: ../view/seller_login.php");
    exit();
}
?>