<?php
include 'validation.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration</title>
    <link rel="stylesheet" href="styles/seller_registration.css">
    <style>
        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>

<h1 id="main-title">Seller Registration</h1>

<form id="registrationForm" action="" autocomplete="on" method="post">
    <fieldset>
        <legend>Business Information</legend>

        <label for="businessName">Business Name:</label><br>
        <input type="text" id="businessName" name="businessName" placeholder="Enter business name"><br>

        <label for="businessAddress">Business Address:</label><br>
        <input type="text" id="businessAddress" name="businessAddress" placeholder="Enter business address"><br>

        <label for="productCategory">Product/Service Category:</label><br>
        <input type="text" id="productCategory" name="productCategory" placeholder="Enter product/service category"><br>

        <label for="openingDate">Official Opening Date:</label><br>
        <input type="date" id="openingDate" name="openingDate"><br>

        <div class="radio_button">
            <label>Register As:</label><br>
            <input type="radio" id="owner" name="registerAs" value="owner">
            <label for="owner">Owner</label>

            <input type="radio" id="manager" name="registerAs" value="manager">
            <label for="manager">Manager</label>

            <input type="radio" id="other" name="registerAs" value="other">
            <label for="other">Other</label><br>
        </div>
    </fieldset>

    <fieldset>
        <legend>Contact Information</legend>

        <label for="contactName">Contact Person Name:</label><br>
        <input type="text" id="contactName" name="contactName" placeholder="Enter contact person name"><br>

        <label for="contactEmail">Business Email:</label><br>
        <input type="email" id="contactEmail" name="contactEmail" placeholder="Enter business email"><br>

        <label for="contactPhone">Phone Number:</label><br>
        <input type="tel" id="contactPhone" name="contactPhone" placeholder="Enter phone number"><br>
    </fieldset>

    <fieldset>
        <legend>Account Details</legend>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" placeholder="Enter username"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Enter password"><br>

        <label for="agree_terms">Agree to Terms:</label><br>
        <input type="checkbox" id="agree_terms" name="agree_terms">
        <label for="agree_terms">I agree to the 
            <a href="https://web.facebook.com/avoy.mollick.562" target="_blank">Terms and Conditions</a>
        </label><br>
    </fieldset><br>

    <input type="submit" value="Create Account">
    <input type="reset" value="Reset Fields">
</form>

</body>
</html>
