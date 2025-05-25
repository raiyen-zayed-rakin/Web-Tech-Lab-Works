
<?php
include "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $connobj = createCon();

  if ($_POST["password"] !== $_POST["confirm-password"]) {
    die("Passwords do not match.");
  }

  $owns_restaurant = ($_POST["restaurant"] === "yes") ? 1 : 0;

  if (insertCustomer(
    $connobj,
    $_POST["fname"],
    $_POST["lname"],
    $_POST["email"],
    $_POST["phone"],
    $_POST["dob"],
    $_POST["gender"],
    $_POST["address"],
    $_POST["username"],
    $owns_restaurant,
    $_POST["password"]
  )) {
    echo "inserted";
  } 
  else {
    die("Error inserting customer details: " . mysqli_error($connobj));
  }

  closeCon($connobj);
}
?>