
<?php
include "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connobj = createCon();

    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if (isCustomerValid($connobj, $email, $password)) {
        header("Location: ../view/home.php");
        exit(); 
        
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        // Then optionally redirect after delay
        echo "<script>window.location.href = '../view/customer_login.php';</script>";
    }

    closeCon($connobj);
}
?>
