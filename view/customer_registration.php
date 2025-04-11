<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/customer_registration.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet" />
    <title>Customer Registration</title>
</head>
<body>
    <!-- Header -->
    <header id="header-portion">
        <h1 class="heading-title">Customer Registration</h1>
    </header>

    <!-- Form Body -->
    <main id="body-portion">
        <form class="info-box" action="#" method="post">
            <!-- Name Section -->
            <div class="name-section">
                <div class="fname-section">
                    <label for="fname">First Name:</label>
                    <input class="input-box" id="fname" name="fname" type="text" placeholder="Enter first name" required />
                </div>
                <div class="lname-section">
                    <label for="lname">Last Name:</label>
                    <input class="input-box" id="lname" name="lname" type="text" placeholder="Enter last name" required />
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email">Email Address:</label>
                <input class="input-box" id="email" name="email" type="email" placeholder="Enter email address" required />
            </div>

            <!-- Phone -->
            <div>
                <label for="phone">Phone Number:</label>
                <input class="input-box" id="phone" name="phone" type="tel" placeholder="Enter phone number" required />
            </div>

            <!-- DOB and Gender -->
            <div class="dob-gender-section">
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input class="date-box" id="dob" name="dob" type="date" required />
                </div>
                <div>
                    <label class="gender-label">Gender:</label><br />
                    <input type="radio" id="male" name="gender" value="male" />
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="female" />
                    <label for="female">Female</label>

                    <input type="radio" id="other" name="gender" value="other" />
                    <label for="other">Other</label>
                </div>
            </div>

            <!-- Address -->
            <div>
                <label for="address">Current Address:</label>
                <input class="input-box" id="address" name="address" type="text" placeholder="Enter address" required />
            </div>

            <!-- Username -->
            <div>
                <label for="username">Create Username:</label>
                <input class="input-box" id="username" name="username" type="text" placeholder="Enter username" required />
            </div>

            <!-- Restaurant Business -->
            <div class="own-work-radio">
                <div>
                    <label>Own or work in a restaurant business:</label>
                
                </div>
                <div>
                    <input type="radio" id="restaurant-yes" name="restaurant" value="yes" />
                    <label for="restaurant-yes">Yes</label>
                    <input type="radio" id="restaurant-no" name="restaurant" value="no" />
                    <label for="restaurant-no">No</label>
                </div>
            </div>

            <!-- Password Section -->
            <div class="password-section">
                <div class="pass-section">
                    <label for="password">Password:</label>
                    <input class="input-box" id="password" name="password" type="password" placeholder="Enter password" required />
                </div>
                <div class="confirm-pass-section">
                    <label for="confirm-password">Confirm Password:</label>
                    <input class="input-box" id="confirm-password" name="confirm-password" type="password" placeholder="Re-enter password" required />
                </div>
            </div>

            <!-- Buttons -->
            <div class="btn-section">
                <input class="btn create-account-btn" type="submit" value="Create Account" />
                <input class="btn reset-fields-btn" type="reset" value="Reset Fields" />
            </div>
        </form>
    </main>

    <!-- Footer -->
    <footer id="footer-portion"></footer>
</body>
</html>
