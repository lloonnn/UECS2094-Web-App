// =====================================================
// Task 3 - Client side validation (plain JavaScript)
//
// Rules:
//  - no empty fields
//  - email must not be empty AND must follow the normal format
//  - password must be MORE than 4 characters
// Error messages are shown in red below each field.
// =====================================================

// show a red message under a field
function showError(errorId, message) {
    document.getElementById(errorId).innerHTML = message;
}

// clear all the red messages
function clearErrors(errorIds) {
    for (var i = 0; i < errorIds.length; i++) {
        document.getElementById(errorIds[i]).innerHTML = "";
    }
}

// check the email format, e.g. abc@mail.com
function isEmailValid(email) {
    var pattern = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
    return pattern.test(email);
}

// -----------------------------------------------------
// Registration form (register.php)
// -----------------------------------------------------
function validateRegisterForm() {
    clearErrors(["nameError", "emailError", "sidError", "deptError", "passwordError"]);

    var name     = document.getElementById("name").value.trim();
    var email    = document.getElementById("email").value.trim();
    var sid      = document.getElementById("sid").value.trim();
    var dept     = document.getElementById("department").value;
    var password = document.getElementById("password").value;

    var ok = true;

    // Name - not empty
    if (name === "") {
        showError("nameError", "Please enter your name.");
        ok = false;
    }

    // Email - not empty, then correct format
    if (email === "") {
        showError("emailError", "Please enter your email.");
        ok = false;
    } else if (!isEmailValid(email)) {
        showError("emailError", "Please enter a valid email, example: abc@mail.com");
        ok = false;
    }

    // Student/Staff ID - not empty
    if (sid === "") {
        showError("sidError", "Please enter your Student/Staff ID.");
        ok = false;
    }

    // Department - must be chosen
    if (dept === "") {
        showError("deptError", "Please choose your department.");
        ok = false;
    }

    // Password - not empty, then more than 4 characters
    if (password === "") {
        showError("passwordError", "Please enter your password.");
        ok = false;
    } else if (password.length <= 4) {
        showError("passwordError", "Password must be more than 4 characters.");
        ok = false;
    }

    // returning false stops the form from being submitted
    return ok;
}

// -----------------------------------------------------
// Search profile form (edit_profile.php)
// -----------------------------------------------------
function validateSearchForm() {
    clearErrors(["emailError"]);

    var email = document.getElementById("email").value.trim();

    if (email === "") {
        showError("emailError", "Please enter your email.");
        return false;
    }
    if (!isEmailValid(email)) {
        showError("emailError", "Please enter a valid email, example: abc@mail.com");
        return false;
    }
    return true;
}

// -----------------------------------------------------
// Update profile form (update_profile.php)
// -----------------------------------------------------
function validateUpdateForm() {
    clearErrors(["nameError", "sidError", "deptError", "passwordError"]);

    var name     = document.getElementById("name").value.trim();
    var sid      = document.getElementById("sid").value.trim();
    var dept     = document.getElementById("department").value.trim();
    var password = document.getElementById("password").value;

    var ok = true;

    if (name === "") {
        showError("nameError", "Please enter your name.");
        ok = false;
    }
    if (sid === "") {
        showError("sidError", "Please enter your Student/Staff ID.");
        ok = false;
    }
    if (dept === "") {
        showError("deptError", "Please enter your department.");
        ok = false;
    }
    if (password === "") {
        showError("passwordError", "Please enter your password.");
        ok = false;
    } else if (password.length <= 4) {
        showError("passwordError", "Password must be more than 4 characters.");
        ok = false;
    }

    return ok;
}
