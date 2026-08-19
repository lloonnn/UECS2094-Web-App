function validateForm() {
    let isValid = true;
    let form = document.getElementById("contactForm");

    // Clear previous error messages
    document.querySelectorAll("#contactForm div").forEach(div => {
        div.textContent = "";
    });

    // Validate Salutation
    if (form["salutation"].value.trim() === ""){
        document.getElementById("salutationError").textContent = "Please select your salutation";
        isValid = false;
    }

    // Validate Name
    if (form["name"].value.trim() === ""){
        document.getElementById("nameError").textContent = "Name is required.";
        isValid = false;
    }

    // Validate Email using regex
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (form["email"].value.trim() === ""){
        document.getElementById("emailError").textContent = "Email is required.";
        isValid = false;                
    }
    else if (!emailPattern.test(form["email"].value)){
        document.getElementById("emailError").textContent = "Email is not valid.";
        isValid = false; 
    }

    // Validate Phone Number
    if (form["phone"].value.trim() === ""){
        document.getElementById("phoneError").textContent = "Phone number is required.";
        isValid = false;                
    }
    // else if (!/^\+?\d+([\s-]\d+)*$/.test(form["phone"].value) || !/^\d{10,15}$/.test(phoneDigits)) {
    else if (!(/^\d{10,15}$/).test(form["phone"].value)){
        document.getElementById("phoneError").textContent = "Phone number is not valid.";
        isValid = false; 
    }

    // Validate Enquiry Type, ... convert the checkbox collection into an array
    if (![...form["enquiry"]].some(checkbox => checkbox.checked)){
        document.getElementById("enquiryError").textContent = "Please select at least one type of enquiry";
        isValid = false;
    }

    // Validate Message
    if (form["message"].value.trim() === ""){
        document.getElementById("messageError").textContent = "Message is required.";
        isValid = false;                
    }

    if(isValid){
        form.submit();
    }
}