
<?php
include "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $connobj = createCon();

  $email = $_POST["email"];
  $username = $_POST["username"];

  if ($_POST["password"] !== $_POST["confirm-password"]) {
    die("Passwords do not match.");
  }

   if (isCustomerExists($connobj, $email, $username)) {
        echo "<script>alert('Error: Email or Username already exists.');</script>";
        closeCon($connobj);
        exit;  
    }

  $owns_restaurant = ($_POST["restaurant"] === "yes") ? 1 : 0;

  if (insertCustomer(
    $connobj,
    $_POST["fname"],
    $_POST["lname"],
    $email,
    $_POST["phone"],
    $_POST["dob"],
    $_POST["gender"],
    $_POST["address"],
    $username,
    $owns_restaurant,
    $_POST["password"]
  )) {
  echo "<script>alert('Account Registered Successfully');</script>";

  } 
  else {
    die("Error inserting customer details: " . mysqli_error($connobj));
  }

  closeCon($connobj);
}
?>