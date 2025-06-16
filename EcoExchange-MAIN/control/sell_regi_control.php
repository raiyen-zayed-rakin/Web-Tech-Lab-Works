<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../model/db.php";
include "../php_validation/validation.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $businessName = $_POST["businessName"] ?? '';
    $businessAddress = $_POST["businessAddress"] ?? '';
    $productCategory = $_POST["productCategory"] ?? '';
    $openingDate = $_POST["openingDate"] ?? '';
    $registerAs = $_POST["registerAs"] ?? '';
    $contactName = $_POST["contactName"] ?? '';
    $contactEmail = $_POST["contactEmail"] ?? '';
    $contactPhone = $_POST["contactPhone"] ?? '';
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $agree_terms = isset($_POST["agree_terms"]) ? true : false;

    // Basic validation
    if (empty($businessName)) $errors['businessName'] = "Business name is required";
    if (empty($businessAddress)) $errors['businessAddress'] = "Business address is required";
    if (empty($contactName)) $errors['contactName'] = "Contact name is required";
    if (empty($contactEmail) || !filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) $errors['contactEmail'] = "Valid email is required";
    if (empty($contactPhone) || !preg_match('/^\d{11}$/', $contactPhone)) $errors['contactPhone'] = "11-digit phone number is required";
    if (empty($username)) $errors['username'] = "Username is required";
    if (empty($password) || strlen($password) < 6) $errors['password'] = "Password must be at least 6 characters";
    if (!$agree_terms) $errors['agree_terms'] = "You must agree to the terms";

    if (empty($errors)) {
        $conn = createCon();
        
        // Check for existing user
        if (isSellerExists($conn, $contactEmail, $username)) {
            $errors['duplicate'] = "Email or username already exists";
        } else {
            // Insert into database
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $result = insertSeller(
                $conn,
                $businessName,
                $businessAddress,
                $productCategory,
                $openingDate,
                $registerAs,
                $contactName,
                $contactEmail,
                $contactPhone,
                $username,
                $password_hash
            );

            if ($result) {
                $_SESSION['success'] = "Registration successful! You can now login.";
                header("Location: seller-registration.php");
                exit();
            } else {
                $errors['db'] = "Database error: " . mysqli_error($conn);
            }
        }
        
        closeCon($conn);
    }
}
?>