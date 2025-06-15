<?php
session_start();
include "../control/sell_regi_control.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration</title>
<link rel="stylesheet" href="../css/seller_registration.css">    <style>
        .error { color: red; font-size: 13px; }
        .success { color: green; text-align: center; margin: 10px 0; }
    </style>
</head>
<body>

<?php require "../layouts/header.php"; ?>

<h1 id="main-title">Seller Registration</h1>

<?php if (isset($_SESSION['success'])): ?>
    <div class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

<form method="post" action="" id="registrationForm">
    <fieldset>
        <legend>Business Information</legend>
        
        <label for="businessName">Business Name:</label>
        <input type="text" id="businessName" name="businessName" value="<?php echo htmlspecialchars($_POST['businessName'] ?? ''); ?>">
        <span class="error"><?php echo $errors['businessName'] ?? ''; ?></span>
        
        <label for="businessAddress">Business Address:</label>
        <input type="text" id="businessAddress" name="businessAddress" value="<?php echo htmlspecialchars($_POST['businessAddress'] ?? ''); ?>">
        <span class="error"><?php echo $errors['businessAddress'] ?? ''; ?></span>
        
        <label for="productCategory">Product Category:</label>
        <input type="text" id="productCategory" name="productCategory" value="<?php echo htmlspecialchars($_POST['productCategory'] ?? ''); ?>">
        <span class="error"><?php echo $errors['productCategory'] ?? ''; ?></span>
        
        <label for="openingDate">Opening Date:</label>
        <input type="date" id="openingDate" name="openingDate" value="<?php echo htmlspecialchars($_POST['openingDate'] ?? ''); ?>">
        <span class="error"><?php echo $errors['openingDate'] ?? ''; ?></span>
        
        <label>Register As:</label>
        <input type="radio" id="individual" name="registerAs" value="individual" <?php if (($_POST['registerAs'] ?? '') === 'individual') echo 'checked'; ?>>
        <label for="individual" style="display: inline;">Individual</label>
        <input type="radio" id="company" name="registerAs" value="company" <?php if (($_POST['registerAs'] ?? '') === 'company') echo 'checked'; ?>>
        <label for="company" style="display: inline;">Company</label>
        <span class="error"><?php echo $errors['registerAs'] ?? ''; ?></span>

        <label for="businessName">Business Name:</label><br>
        <input type="text" id="businessName" name="businessName" placeholder="Enter business name" value="<?php echo htmlspecialchars($_POST['businessName'] ?? '', ENT_QUOTES); ?>"><br>
        <span id="businessNameError" class="error"><?php echo $errors['businessName'] ?? ''; ?></span><br>

        <label for="businessAddress">Business Address:</label><br>
        <input type="text" id="businessAddress" name="businessAddress" placeholder="Enter business address" value="<?php echo htmlspecialchars($_POST['businessAddress'] ?? '', ENT_QUOTES); ?>"><br>

        <label for="productCategory">Product/Service Category:</label><br>
        <input type="text" id="productCategory" name="productCategory" placeholder="Enter product/service category" value="<?php echo htmlspecialchars($_POST['productCategory'] ?? '', ENT_QUOTES); ?>"><br>

        <label for="openingDate">Official Opening Date:</label><br>
        <input type="date" id="openingDate" name="openingDate" value="<?php echo htmlspecialchars($_POST['openingDate'] ?? '', ENT_QUOTES); ?>"><br>

        <div class="radio_button">
            <label>Register As:</label><br>
            <input type="radio" id="owner" name="registerAs" value="owner" <?php if (isset($_POST['registerAs']) && $_POST['registerAs'] === 'owner') echo 'checked'; ?>>
            <label for="owner">Owner</label>

            <input type="radio" id="manager" name="registerAs" value="manager" <?php if (isset($_POST['registerAs']) && $_POST['registerAs'] === 'manager') echo 'checked'; ?>>
            <label for="manager">Manager</label>

            <input type="radio" id="other" name="registerAs" value="other" <?php if (isset($_POST['registerAs']) && $_POST['registerAs'] === 'other') echo 'checked'; ?>>
            <label for="other">Other</label><br>
            <span id="registerAsError" class="error"><?php echo $errors['registerAs'] ?? ''; ?></span><br>
        </div>
    </fieldset>

    <fieldset>
        <legend>Contact Information</legend>
        
        <label for="contactName">Contact Person:</label>
        <input type="text" id="contactName" name="contactName" value="<?php echo htmlspecialchars($_POST['contactName'] ?? ''); ?>">
        <span class="error"><?php echo $errors['contactName'] ?? ''; ?></span>
        
        <label for="contactEmail">Contact Email:</label>
        <input type="email" id="contactEmail" name="contactEmail" value="<?php echo htmlspecialchars($_POST['contactEmail'] ?? ''); ?>">
        <span class="error"><?php echo $errors['contactEmail'] ?? ''; ?></span>
        
        <label for="contactPhone">Contact Phone:</label>
        <input type="tel" id="contactPhone" name="contactPhone" value="<?php echo htmlspecialchars($_POST['contactPhone'] ?? ''); ?>">
        <span class="error"><?php echo $errors['contactPhone'] ?? ''; ?></span>
    </fieldset>

    <fieldset>
        <legend>Account Details</legend>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
        <span class="error"><?php echo $errors['username'] ?? ''; ?></span>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span class="error"><?php echo $errors['password'] ?? ''; ?></span>
        
        <input type="checkbox" id="agree_terms" name="agree_terms" <?php if (isset($_POST['agree_terms'])) echo 'checked'; ?>>
        <label for="agree_terms">I agree to terms</label>
        <span class="error"><?php echo $errors['agree_terms'] ?? ''; ?></span>
    </fieldset>

    <span class="error"><?php echo $errors['duplicate'] ?? $errors['db'] ?? ''; ?></span>
    
    <input type="submit" value="Register">
    <input type="reset" value="Clear">
    
    <div class="form-links">
        <a href="login.php" class="form-link">Already have an account? Login</a>
        <a href="customer-registration.php" class="form-link">Register as Customer</a>
    </div>
</form>

<?php require "../layouts/footer.php"; ?>

<script src="../js/seller_registration.js"></script>
</body>
</html>