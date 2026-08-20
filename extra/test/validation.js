// ============================================================
// Task 3 (b) : Client-side validation for account.php
// ============================================================

function validateForm() {

    var valid = true;

    // Get the values typed by the user
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var studentId = document.getElementById("student_id").value;
    var password = document.getElementById("password").value;

    // Clear the old error messages
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("studentIdError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    // 1. Full Name must be filled out
    if (name == "") {
        document.getElementById("nameError").innerHTML = "Full Name is required.";
        valid = false;
    }

    // 2. Email must be filled out and in a valid format
    if (email == "") {
        document.getElementById("emailError").innerHTML = "Email Address is required.";
        valid = false;
    } else if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) == false) {
        document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
        valid = false;
    }

    // 3. Student ID must be numeric with 7 digits
    if (studentId == "") {
        document.getElementById("studentIdError").innerHTML = "Student ID is required.";
        valid = false;
    } else if (/^[0-9]{7}$/.test(studentId) == false) {
        document.getElementById("studentIdError").innerHTML = "Student ID must be exactly 7 digits.";
        valid = false;
    }

    // 4. Password must be at least 6 characters long
    if (password == "") {
        document.getElementById("passwordError").innerHTML = "Password is required.";
        valid = false;
    } else if (password.length < 6) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters long.";
        valid = false;
    }

    // if valid is false, the form will not be submitted
    return valid;
}
