
<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$values = $_SESSION['values'] ?? [
    'fname' => '', 'lname' => '', 'email' => '', 'phone' => '',
    'address' => '', 'confirmAddress' => '', 'dob' => '',
    'gender' => '', 'ownwork' => '', 'password' => '', 'confirmPassword' => ''
];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['values'], $_SESSION['success']);

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

    $errors = [];

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
        $_SESSION['success'] = "Registration successful!";
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['values'] = $values;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
