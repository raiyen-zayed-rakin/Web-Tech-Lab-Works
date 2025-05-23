

    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        let isValid = true;

        // Clear previous errors
        document.getElementById("businessNameError").innerHTML = "";
        document.getElementById("contactEmailError").innerHTML = "";
        document.getElementById("contactPhoneError").innerHTML = "";
        document.getElementById("passwordError").innerHTML = "";
        document.getElementById("registerAsError").innerHTML = "";

        // Business Name Validation
        let businessName = document.getElementById("businessName").value.trim();
        if (businessName.length < 3) {
            document.getElementById("businessNameError").innerHTML = "Business name must be at least 3 characters.";
            isValid = false;
        }

        // Email Validation
        let email = document.getElementById("contactEmail").value.trim();
        let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(email)) {
            document.getElementById("contactEmailError").innerHTML = "Enter a valid email address.";
            isValid = false;
        }

        // Phone Number Validation (Assuming Bangladesh format - 11 digits)
        let phone = document.getElementById("contactPhone").value.trim();
        let phonePattern = /^\d{11}$/;
        if (!phonePattern.test(phone)) {
            document.getElementById("contactPhoneError").innerHTML = "Phone number must be 11 digits.";
            isValid = false;
        }

        // Password Validation
        let password = document.getElementById("password").value;
        if (password.length < 6) {
            document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters.";
            isValid = false;
        }

        // Radio Button Validation
        let isRadioSelected =
            document.getElementById("owner").checked ||
            document.getElementById("manager").checked ||
            document.getElementById("other").checked;

        if (!isRadioSelected) {
            document.getElementById("registerAsError").innerHTML = "Please select a role.";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Stop form submission
        }
    });
