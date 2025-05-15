
<?php
$errors = [];
$values = [
    'fname' => '', 'lname' => '', 'email' => '', 'phone' => '',
    'address' => '', 'confirmAddress' => '', 'dob' => '',
    'gender' => '', 'ownwork' => '', 'password' => '', 'confirmPassword' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $values['fname'] = trim($_POST['fname'] ?? '');
    $values['lname'] = trim($_POST['lname'] ?? '');
    $values['email'] = trim($_POST['email'] ?? '');
    $values['phone'] = trim($_POST['phone'] ?? '');
    $values['address'] = trim($_POST['address'] ?? '');
    $values['confirmAddress'] = trim($_POST['confirmAddress'] ?? '');
    $values['dob'] = trim($_POST['dob'] ?? '');
    $values['gender'] = trim($_POST['gender'] ?? '');
    $values['ownwork'] = trim($_POST['ownwork'] ?? '');
    $values['password'] = trim($_POST['password'] ?? '');
    $values['confirmPassword'] = trim($_POST['confirmPassword'] ?? '');


    if ($values['fname'] === '') $errors['fname'] = 'First name is required.';
    if ($values['lname'] === '') $errors['lname'] = 'Last name is required.';
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Valid email required.';
    if ($values['phone'] === '') $errors['phone'] = 'Phone number is required.';
    if ($values['address'] === '') $errors['address'] = 'Address is required.';
    if ($values['address'] !== $values['confirmAddress']) $errors['confirmAddress'] = 'Addresses do not match.';
    if ($values['password'] === '') $errors['password'] = 'Password is required.';
    if ($values['password'] !== $values['confirmPassword']) $errors['confirmPassword'] = 'Passwords do not match.';
    if ($values['dob'] === '') $errors['dob'] = 'Date of birth required.';
    if ($values['gender'] === '') $errors['gender'] = 'Gender required.';
    if ($values['ownwork'] === '') $errors['ownwork'] = 'Please select an option.';

    if (empty($errors)) {
        echo "<p style='color:green;'>Registration successful!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="styles/customer_registration.css">
</head>
<body>
    <header><h1 class="heading-title">Customer Registration</h1></header>
    <main>
        <form class="info-box" method="POST" action="customer_registration_php_only.php">
            <div class="name-section">
                <div class="fname-section">
                    <label>First Name<span>*</span></label>
                    <input type="text" name="fname" class="input-box" value="<?= htmlspecialchars($values['fname']) ?>">
                    <span class="error-message"><?= $errors['fname'] ?? '' ?></span>
                </div>
                <div class="lname-section">
                    <label>Last Name<span>*</span></label>
                    <input type="text" name="lname" class="input-box" value="<?= htmlspecialchars($values['lname']) ?>">
                    <span class="error-message"><?= $errors['lname'] ?? '' ?></span>
                </div>
            </div>

            <label>Email<span>*</span></label>
            <input type="email" name="email" class="input-box" value="<?= htmlspecialchars($values['email']) ?>">
            <span class="error-message"><?= $errors['email'] ?? '' ?></span>

            <label>Phone Number<span>*</span></label>
            <input type="text" name="phone" class="input-box" value="<?= htmlspecialchars($values['phone']) ?>">
            <span class="error-message"><?= $errors['phone'] ?? '' ?></span>

            <label>Current Address<span>*</span></label>
            <input type="text" name="address" class="input-box" value="<?= htmlspecialchars($values['address']) ?>">
            <span class="error-message"><?= $errors['address'] ?? '' ?></span>

            <label>Confirm Address<span>*</span></label>
            <input type="text" name="confirmAddress" class="input-box" value="<?= htmlspecialchars($values['confirmAddress']) ?>">
            <span class="error-message"><?= $errors['confirmAddress'] ?? '' ?></span>

            <div class="password-section">
                <div class="pass-section">
                    <label>Password<span>*</span></label>
                    <input type="password" name="password" class="input-box">
                    <span class="error-message"><?= $errors['password'] ?? '' ?></span>
                </div>
                <div class="confirm-pass-section">
                    <label>Confirm Password<span>*</span></label>
                    <input type="password" name="confirmPassword" class="input-box">
                    <span class="error-message"><?= $errors['confirmPassword'] ?? '' ?></span>
                </div>
            </div>

            <div class="dob-gender-section">
                <div>
                    <label>Date of Birth<span>*</span></label>
                    <input type="date" name="dob" class="date-box" value="<?= htmlspecialchars($values['dob']) ?>">
                    <span class="error-message"><?= $errors['dob'] ?? '' ?></span>
                </div>
                <div>
                    <label class="gender-label">Gender<span>*</span></label>
                    <select name="gender" class="input-box">
                        <option value="">-- Select --</option>
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
                        <label><input type="radio" name="ownwork" value="Yes" <?= $values['ownwork'] === 'Yes' ? 'checked' : '' ?>>Yes</label>
                        <label><input type="radio" name="ownwork" value="No" <?= $values['ownwork'] === 'No' ? 'checked' : '' ?>>No</label>
                    </div>
                    <span class="error-message"><?= $errors['ownwork'] ?? '' ?></span>
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
