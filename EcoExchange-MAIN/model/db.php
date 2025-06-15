<?php

function createCon(){
    return mysqli_connect("localhost", "root","", "ecoexchange");
}

//customer
function insertCustomer($conn, $fname, $lname, $email, $phone, $dob, $gender, $address, $username, $own_business, $pass){
 $sql="INSERT INTO customers (first_name, last_name, email, phone, date_of_birth, gender, current_address, username, owns_restaurant,
password_hash) 
VALUES ('$fname', '$lname', '$email', '$phone', '$dob', '$gender', '$address', '$username', '$own_business', '$pass')";
$result = mysqli_query($conn, $sql);
if($result === false)
{
    return mysqli_error($conn);
}
else{
    return $result;
}
}

function isCustomerExists($conn, $email, $username) {
    $sql = "SELECT * FROM customers WHERE email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function isCustomerValid($conn, $email, $password) {
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "SELECT password_hash FROM customers WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a matching user is found
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        //no hash typo
        $hashedPassword = $row['password_hash'];

        // If passwords are hashed
        // if (password_verify($password, $hashedPassword)) {
        //     return true;
        // }
        // If not hashed, use plain comparison (NOT recommended for production)
        if ($password === $hashedPassword) {
            return true;
        }
    }

    return false;
}



//seller
function insertSeller($conn, $businessName, $businessAddress, $productCategory, $openingDate, $registerAs, $contactName, $contactEmail, $contactPhone, $username, $password) {
    $sql = "INSERT INTO sellers (
        business_name,
        business_address,
        product_category,
        opening_date,
        register_as,
        contact_name,
        contact_email,
        contact_phone,
        username,
        password_hash
    ) VALUES (
        '$businessName',
        '$businessAddress',
        '$productCategory',
        '$openingDate',
        '$registerAs',
        '$contactName',
        '$contactEmail',
        '$contactPhone',
        '$username',
        '$password'
    )";

    $result = mysqli_query($conn, $sql);
    return $result;
}

function isSellerExists($conn, $email, $username) {
    $email = mysqli_real_escape_string($conn, $email);
    $username = mysqli_real_escape_string($conn, $username);
    $sql = "SELECT * FROM sellers WHERE contact_email='$email' OR username='$username'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function isSellerValid($conn, $username, $password) {
    $stmt = mysqli_prepare($conn, "SELECT seller_id, password_hash FROM sellers WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password_hash'])) {
            return $row['seller_id'];
        }
    }
    return false;
}

// Add this function to your existing db.php
function verifySellerLogin($conn, $username, $password) {
    $sql = "SELECT seller_id, username, business_name, password_hash FROM sellers WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        $seller = mysqli_fetch_assoc($result);
        if (password_verify($password, $seller['password_hash'])) {
            return $seller;
        }
    }
    return false;
}

function verify_seller($conn, $username, $password) {
    $username = mysqli_real_escape_string($conn, $username);
    $sql = "SELECT id, username, business_name, password_hash FROM sellers WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $seller = mysqli_fetch_assoc($result);
        if (password_verify($password, $seller['password_hash'])) {
            return $seller;
        }
    }
    return false;
}

function verify_admin($conn, $username, $password) {
    $username = mysqli_real_escape_string($conn, $username);
    
    $sql = "SELECT admin_id, password_hash FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);
        if (password_verify($password, $admin['password_hash'])) {
            return $admin['admin_id'];
        }
    }
    return false;
}


function closeCon($conn){
    return mysqli_close($conn);
}

?>