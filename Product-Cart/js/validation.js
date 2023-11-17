function validateForm() {
 var username = document.querySelector('input[name="username"]').value;
 var password = document.querySelector('input[name="password"]').value;
 var confirmPassword = document.querySelector('input[name="confpassword"]').value;
 var email = document.querySelector('input[name="email"]').value;
 var fullname = document.querySelector('input[name="fullname"]').value;
 var phonenumber = document.querySelector('input[name="phonenumber"]').value;

 if (username.trim() === '' || password.trim() === '' || confirmPassword.trim() === '' || email.trim() === '' || fullname.trim() === '' || phonenumber.trim() === '') {
     document.getElementById('error-message').innerText = 'Please fill in all fields.';
     return false;
 }

 if (!validateUsername(username)) {
     document.getElementById('usernameError').innerText = 'Letters and numbers only.';
     return false;
 } else {
     document.getElementById('usernameError').innerText = '';
 }

 if (email.trim() === '') {
     document.getElementById('emailError').innerText = 'Please enter an email.';
     return false;
 }

 if (!validateEmailWithDomain(email)) {
     document.getElementById('emailError').innerText = 'Valid email domains are: gmail.com, yahoo.com, outlook.com';
     return false;
 } else {
     document.getElementById('emailError').innerText = '';
 }

 if (!validateEmail(email)) {
     document.getElementById('emailError').innerText = 'Enter a valid email address.';
     return false;
 } else {
     document.getElementById('emailError').innerText = '';
 }

 if (!validatePassword(password)) {
     document.getElementById('passwordError').innerText = 'Min 8 chars, 1 uppercase, 1 lowercase, 1 number, and 1 special character.';
     return false;
 } else {
     document.getElementById('passwordError').innerText = '';
 }

 if (password !== confirmPassword) {
     document.getElementById('confpasswordError').innerText = 'Passwords do not match.';
     return false;
 } else {
     document.getElementById('confpasswordError').innerText = '';
 }

 if (fullname.trim() === '') {
     document.getElementById('fullnameError').innerText = 'Please enter your full name.';
     return false;
 } else {
     document.getElementById('fullnameError').innerText = '';
 }

 if (!validatePhoneNumber(phonenumber)) {
     document.getElementById('phonenumberError').innerText = 'Please enter a valid phone number.';
     return false;
 } else {
     document.getElementById('phonenumberError').innerText = '';
 }

 return true; // Form will submit if all validations pass
}

 function validateUsername(username) {
     return /^[a-zA-Z0-9]+$/.test(username);
 }

 function validatePhoneNumber(phonenumber) {
 return /^[0-9]+$/.test(phonenumber);
 }

 function validateEmail(email) {
     return /\S+@\S+\.\S+/.test(email);
 }

 function validateEmailWithDomain(email) {
     // Extract domain from email
     var domain = email.split('@')[1];

     // List of valid email domains
     var validDomains = ['gmail.com', 'yahoo.com', 'outlook.com'];

     // Check if the extracted domain is in the list of valid domains
     return validDomains.includes(domain);
 }

 function validatePassword(password) {
     return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
 }

