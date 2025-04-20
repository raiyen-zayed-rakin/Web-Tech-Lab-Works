
document.getElementById("registration-form").addEventListener("submit", function (e) {
  e.preventDefault();
  if (validateForm()) {
    alert("Form submitted successfully!");
  }
});

function validateForm() {
  let isValid = true;
  document.getElementById("fname-error").innerText = "";
  document.getElementById("lname-error").innerText = "";
  document.getElementById("email-error").innerText = "";
  document.getElementById("phone-error").innerText = "";
  document.getElementById("dob-error").innerText = "";
  document.getElementById("gender-error").innerText = "";
  document.getElementById("address-error").innerText = "";
  document.getElementById("username-error").innerText = "";
  document.getElementById("password-error").innerText = "";
  document.getElementById("confirm-password-error").innerText = "";
  document.getElementById("restaurant-error").innerText = "";

  //elements
  const fname = document.getElementById("fname").value.trim();
  const lname = document.getElementById("lname").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const dob = document.getElementById("dob").value;
  const gender = document.getElementById("gender").value;
  const address = document.getElementById("address").value.trim();
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  const restaurantYes = document.getElementById("restaurant-yes").checked;
  const restaurantNo = document.getElementById("restaurant-no").checked;

  if (!fname || hasNumber(fname)) {
    document.getElementById("fname-error").innerHTML = "First name must contain only letters.";
    isValid = false;
  }

  if (!lname || hasNumber(lname)) {
    document.getElementById("lname-error").innerHTML = "Last name must contain only letters.";
    isValid = false;
  }

  if (!email.includes("@") || !email.includes(".") || email.startsWith("@") || email.endsWith(".")) {
    document.getElementById("email-error").innerHTML = "Please enter a valid email address.";
    isValid = false;
  }

  if (phone.length < 11 || !isPhoneValid(phone)) {
    document.getElementById("phone-error").innerHTML = "Please enter a valid phone number.";
    isValid = false;
  }

  if (!dob) {
    document.getElementById("dob-error").innerHTML = "Please select your date of birth.";
    isValid = false;
  }

  if (!gender) {
    document.getElementById("gender-error").innerHTML = "Please select your gender.";
    isValid = false;
  }

  if (address.length < 5) {
    document.getElementById("address-error").innerHTML = "Please enter a valid address.";
    isValid = false;
  }

  if (username.length < 4) {
    document.getElementById("username-error").innerHTML = "Username must be at least 4 characters.";
    isValid = false;
  }

  if (password.length < 6) {
    document.getElementById("password-error").innerHTML = "Password must be at least 6 characters.";
    isValid = false;
  }

  if (confirmPassword !== password) {
    document.getElementById("confirm-password-error").innerHTML = "Passwords do not match.";
    isValid = false;
  }

  if (!restaurantYes && !restaurantNo) {
    document.getElementById("restaurant-error").innerHTML = "Please select an option.";
    isValid = false;
  }

  return isValid;
}

function hasNumber(str) {
  for (let i = 0; i < str.length; i++) {
    if (!isNaN(str[i]) && str[i] !== " ") return true;
  }
  return false;
}

function isPhoneValid(str) {
  const allowedChars = "0123456789-+() ";
  for (let i = 0; i < str.length; i++) {
    if (!allowedChars.includes(str[i]))
    {
        return false;
    } 
  }
  return true;
}
