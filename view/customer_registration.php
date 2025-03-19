<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/customer_registration.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
    <title>Customer Registration</title>
</head>
<body>
    <!-- Header -->
    <div id="header-portion">
        <h1 class="heading-title">Customer Registration</h1>
    </div>
    <!-- main body -->
    <div id="body-portion">
        <form action="" class="info-box">
            <div class="name-section">
                <div class="fname-section">
                    <div>
                        <label for="fname">First Name:</label>
                    </div>
                    <div>
                        <input class="input-box"type="text" placeholder="Enter first name">
                    </div>
                </div>
                <div class="lname-section">
                    <div>
                        <label for="lname">Last Name:</label>
                    </div>
                    <div>
                        <input class="input-box"type="text" placeholder="Enter last name">
                    </div>
                </div>
            </div>
            <div>
                <label for="">Email Address:</label><br>
                <input class="input-box"type="text" placeholder="Enter email address"><br>
            </div>
            <div>
                <label for="">Phone Number:</label><br>
                <input class="input-box"type="text" placeholder="Enter email address"><br>
            </div>
            <div class="dob-gender-section">
                <div>
                    <label for="">Date of Birth:</label>
                    <input class="date-box input-box"type="date" name="" id=""><br>
                </div>
                <div>    
                    <label for="">Gender:</label>
                    <input class=""type="radio" id="gender1" name="gender1" value="gender1">Male
                    <input class=""type="radio" id="gender2" name="gender1" value="gender2">Female
                    <input class=""type="radio" id="gender2" name="gender1" value="gender2">other<br>
                </div>
            </div>
            <div>    
                <label for="">Current Address:</label><br>
                <input class="input-box"type="text" placeholder="Enter address"><br>
            </div>
            <div>
                <label for="fname">Create Username:</label><br>
                <input class="input-box"type="text" placeholder="Enter username"><br>
            </div>
            <div class="own-work-radio">
                <label for="">Own or work in a restaurant business:</label>
                <input class=""type="radio" id="yes" name="yes" value="yes">yes
                <input class=""type="radio" id="no" name="yes" value="no">No
            </div>
            <div class="password-section">
                <div class="pass-section">
                    <div>
                        <label for="pass">Password:</label>
                    </div>
                    <div>
                        <input class="input-box"type="text" placeholder="Enter Password">
                    </div>
                </div>
                <div class="confirm-pass-section">
                    <div>
                        <label for="lname">Confirm Password:</label>
                    </div>
                    <div>
                        <input class="input-box"type="text" placeholder="Enter password again">
                    </div>
                </div>
            </div>
            <div>
                <input class="btn create-account-btn" type="button" value="Create Account" name="" id="">
                <input class="btn reset-fields-btn" type="button" value="Reset Fields" name="" id="">
            </div>
        </form>
        <br>
    </div>
    <!-- footer-skip for now -->
    <div id="footer-portion">

    </div>

</body>
</html>