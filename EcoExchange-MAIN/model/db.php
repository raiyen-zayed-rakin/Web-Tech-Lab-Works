<?php

function createCon(){
    return mysqli_connect("localhost", "root","", "ecoexchange");
}

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
    $sql = "SELECT * FROM sellers WHERE contact_email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}


function closeCon($conn){
    return mysqli_close($conn);
}

?>