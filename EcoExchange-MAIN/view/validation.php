<?php
$errors = [];
$businessName = $contactName = $contactEmail = $contactPhone = $username = $registerAs = "";
$agree_terms = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and trim all inputs
    $businessName = trim($_POST["businessName"] ?? "");
    $contactName = trim($_POST["contactName"] ?? "");
    $contactEmail = trim($_POST["contactEmail"] ?? "");
    $contactPhone = trim($_POST["contactPhone"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $registerAs = trim($_POST["registerAs"] ?? "");
    $agree_terms = isset($_POST["agree_terms"]);

    // Validate business fields
    if (empty($businessName)) $errors['businessName'] = "Business name is required";
    if (empty($_POST["businessAddress"])) $errors['businessAddress'] = "Address is required";
    if (empty($_POST["productCategory"])) $errors['productCategory'] = "Category is required";
    if (empty($_POST["openingDate"])) $errors['openingDate'] = "Opening date is required";
    if (empty($registerAs)) $errors['registerAs'] = "Please select your role";

    // Validate contact fields
    if (empty($contactName)) $errors['contactName'] = "Contact name is required";
    if (empty($contactEmail)) {
        $errors['contactEmail'] = "Email is required";
    } elseif (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
        $errors['contactEmail'] = "Invalid email format";
    }
    if (empty($contactPhone)) {
        $errors['contactPhone'] = "Phone is required";
    } elseif (!preg_match('/^\d{11}$/', $contactPhone)) {
        $errors['contactPhone'] = "Phone must be 11 digits";
    }

<<<<<<< HEAD
    // Validate account fields
    if (empty($username)) $errors['username'] = "Username is required";
    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    } elseif (strlen($_POST["password"]) < 6) {
        $errors['password'] = "Password must be 6+ characters";
=======
    if ($_POST["businessAddress"] == "") {
        $errors['businessAddress'] = "Business Address is required.";
    }

    if ($_POST["productCategory"] == "") {
        $errors['productCategory'] = "Product/Service Category is required.";
    }

    if ($_POST["openingDate"] == "") {
        $errors['openingDate'] = "Opening Date is required.";
    }


    if (!isset($_POST["registerAs"])) {
        $errors['registerAs'] = "Please select your role (Owner, Manager, Other).";
    } else {
        $registerAs = $_POST["registerAs"];
    }

    $contactName = $_POST["contactName"];
    if ($contactName == "") {
        $errors['contactName'] = "Contact Person Name is required.";
    }

    $username = $_POST["username"];
    if ($username == "") {
        $errors['username'] = "Username is required.";
    }


    if ($_POST["password"] == "") {
        $errors['password'] = "Password is required.";
    }

   
    if (!isset($_POST["agree_terms"])) {
        $errors['agree_terms'] = "You must agree to the Terms and Conditions.";
    } else {
        $agree_terms = true;
    }

    
    if (empty($errors)) {
    } else {
        // Do not echo errors here, just keep them in $errors array for display in form
>>>>>>> ed52d59e4fb8d2cde5f2f39fcf7d62657a1a73e5
    }
    if (!$agree_terms) $errors['agree_terms'] = "You must agree to terms";
}
?>