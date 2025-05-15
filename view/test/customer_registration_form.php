
<?php session_start(); ?>
<?php include 'customer_registration_controller.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="../styles/customer_registration.css">
</head>
<body>
    <header><h1 class="heading-title">Customer Registration</h1></header>
    <main>
        <form class="info-box" method="POST" action="customer_registration_form.php">
        <?php
            if (!empty($success)) {
                echo "<script>alert('".addslashes($success)."');</script>";
            }
        ?>
            <div class="name-section">
                <div class="fname-section">
                    <label>First Name<span>*</span></label>
                    <input type="text" name="fname" class="input-box" value="<?php echo $values['fname'] ?>">
                    <span class="error-message"><?php echo $errors['fname'] ?? '' ?></span>
                </div>
                <div class="lname-section">
                    <label>Last Name<span>*</span></label>
                    <input type="text" name="lname" class="input-box" value="<?php echo $values['lname'] ?>">
                    <span class="error-message"><?php echo $errors['lname'] ?? '' ?></span>
                </div>
            </div>

            <label>Email<span>*</span></label>
            <input type="email" name="email" class="input-box" value="<?php echo $values['email'] ?>">
            <span class="error-message"><?php echo $errors['email'] ?? '' ?></span>

            <label>Phone Number<span>*</span></label>
            <input type="text" name="phone" class="input-box" value="<?php echo $values['phone'] ?>">
            <span class="error-message"><?php echo $errors['phone'] ?? '' ?></span>

            <label>Current Address<span>*</span></label>
            <input type="text" name="address" class="input-box" value="<?php echo $values['address'] ?>">
            <span class="error-message"><?php echo $errors['address'] ?? '' ?></span>

            <label>Confirm Address<span>*</span></label>
            <input type="text" name="confirmAddress" class="input-box" value="<?php echo $values['confirmAddress'] ?>">
            <span class="error-message"><?php echo $errors['confirmAddress'] ?? '' ?></span>

            <div class="password-section">
                <div class="pass-section">
                    <label>Password<span>*</span></label>
                    <input type="password" name="password" class="input-box">
                    <span class="error-message"><?php echo $errors['password'] ?? '' ?></span>
                </div>
                <div class="confirm-pass-section">
                    <label>Confirm Password<span>*</span></label>
                    <input type="password" name="confirmPassword" class="input-box">
                    <span class="error-message"><?php echo $errors['confirmPassword'] ?? '' ?></span>
                </div>
            </div>

            <div class="dob-gender-section">
                <div>
                    <label>Date of Birth<span>*</span></label>
                    <input type="date" name="dob" class="date-box" value="<?php echo $values['dob'] ?>">
                    <span class="error-message"><?php echo $errors['dob'] ?? '' ?></span>
                </div>
                <div>
                    <label class="gender-label">Gender<span>*</span></label>
                    <select name="gender" class="input-box">
                        <option value="">Select</option>
                        <option value="Male" <?= $values['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $values['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $values['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                    <span class="error-message"><?= $errors['gender'] ?? '' ?></span>
                </div>
            </div>

            <div class="own-work-radio">
                <div>
                    <label>Is this your own work?<span>*</span></label>
                    <div class="radio-options">
                        <label><input type="radio" name="ownwork" value="Yes" <?php echo $values['ownwork'] === 'Yes' ? 'checked' : '' ?>>Yes</label>
                        <label><input type="radio" name="ownwork" value="No" <?php echo $values['ownwork'] === 'No' ? 'checked' : '' ?>>No</label>
                    </div>
                    <span class="error-message"><?php echo $errors['ownwork'] ?? '' ?></span>
                </div>
            </div>

            <div class="btn-section">
                <button type="submit" class="btn create-account-btn">Create Account</button>
                <button type="reset" class="btn reset-fields-btn">Reset Fields</button>
            </div>
        </form>
    </main>
</body>
</html>
