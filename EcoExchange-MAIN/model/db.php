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

function closeCon($conn){
    return mysqli_close($conn);
}

?>