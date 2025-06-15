<?php

$errors = [];

$businessName = $contactName = $contactEmail = $contactPhone = $username = $registerAs = "";
$agree_terms = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $businessName = $_POST["businessName"];
    if ($businessName == "") {
        $errors['businessName'] = "Business Name is required.";
    }

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
    }
}
?>
