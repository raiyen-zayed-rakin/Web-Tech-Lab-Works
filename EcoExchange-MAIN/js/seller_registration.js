document.getElementById("registrationForm").addEventListener("submit", function(event) {
    let isValid = true;
    const errors = {};
    
    // Business Name validation
    const businessName = document.getElementById("businessName").value.trim();
    if (businessName.length < 2) {
        errors['businessName'] = "Business name must be at least 2 characters";
        isValid = false;
    }
    
    // Email validation
    const email = document.getElementById("contactEmail").value;
    if (!email.includes("@") || !email.includes(".")) {
        errors['contactEmail'] = "Please enter a valid email";
        isValid = false;
    }
    
    // Phone validation
    const phone = document.getElementById("contactPhone").value;
    if (!/^\d{11}$/.test(phone)) {
        errors['contactPhone'] = "Phone must be 11 digits";
        isValid = false;
    }
    
    // Password validation
    const password = document.getElementById("password").value;
    if (password.length < 6) {
        errors['password'] = "Password must be at least 6 characters";
        isValid = false;
    }
    
    // Register As validation
    if (!document.querySelector('input[name="registerAs"]:checked')) {
        errors['registerAs'] = "Please select your role";
        isValid = false;
    }
    
    // Terms validation
    if (!document.getElementById("agree_terms").checked) {
        errors['agree_terms'] = "You must agree to the terms";
        isValid = false;
    }
    
    // Display errors
    for (const [field, message] of Object.entries(errors)) {
        const errorSpan = document.querySelector(`[name="${field}"] + .error, #${field} + .error`);
        if (errorSpan) {
            errorSpan.textContent = message;
        }
    }
    
    if (!isValid) {
        event.preventDefault();
    }
});