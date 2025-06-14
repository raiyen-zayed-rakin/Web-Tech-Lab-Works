<?php
include "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = createCon();

    // Check password 
    $password = $_POST["password"] ?? '';

    $businessEmail = $_POST["contactEmail"] ?? '';
    $username = $_POST["username"] ?? '';

    // Check for duplicate email or username
    if (isSellerExists($conn, $businessEmail, $username)) {
        echo "Error: Email or Username already exists.";
        closeCon($conn);
        exit;  // Stop execution here so insertSeller() is NOT called
    }


    // Collect form data
    $businessName = $_POST["businessName"];
    $businessAddress = $_POST["businessAddress"];
    $productCategory = $_POST["productCategory"];
    $openingDate = $_POST["openingDate"];
    $registerAs = $_POST["registerAs"];
    $contactName = $_POST["contactName"];
    $contactEmail = $_POST["contactEmail"];
    $contactPhone = $_POST["contactPhone"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert into database
    if (insertSeller($conn, $businessName, $businessAddress, $productCategory, $openingDate, $registerAs, $contactName, $contactEmail, $contactPhone, $username, $password)) {
        echo "<script>alert('Seller Account Registered Successfully');</script>";
    } else {
        echo "Failed to register seller: " . mysqli_error($conn);
    }

    closeCon($conn);
}
?>
