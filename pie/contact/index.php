<!DOCTYPE html>
<html>
<head>
    <title>About page</title>
    <link rel="stylesheet" href="../style/mystyle.css">
    <style>
        .error{
            color:red;
            font-size: 14px;
        }
    </style>
</head>

<body>    
    <?php include("../includes/header.php")?>
    <?php include("../includes/navigation.php")?>

    <div id="contentWrapper" class="content">
        <form id="contactForm" action="post-message.php" method="post">
            <!--<label for="salutation">Salutation:</label> -->
            Salutation:
            <select id="Sal" name="salutation" required>
                <option disabled selected value>-- Select a Salutation--</option>
                <option value="mr">Mr</option>
                <option value="ms">Ms</option>
                <option value="mrs">Mrs</option>
                <option value="dr">Dr</option>
            </select>
            <div id="salutationError" class="error"></div>

            Name: <input type="text" id="name" name="name" required>
            <div id="nameError" class="error"></div>

            E-mail: <input type="email" id="email" name="email" required>
            <div id="emailError" class="error"></div>

            Phone Number: <input type="tel" id="phone" name="phone" required>
            <div id="phoneError" class="error"></div>

            Type of Enquiry:
            <input type="checkbox" name="enquiry" value="General Enquiry">General Enquiry
            <input type="checkbox" name="enquiry" value="Complaints">Complaints
            <input type="checkbox" name="enquiry" value="Suggestions">Suggestions
            <div id="enquiryError" class="error"></div>

            Subject: <br>
            <textarea id="message" name="message" rows="10" cols="30" required></textarea>
            <div id="messageError" class="error"></div>

            <input type="button" value="Send" onclick="validateForm()">
        </form>
    </div>
    
    <?php include("../includes/footer.php")?>

    <script>
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
            else if (!/^d{10, 15}/.test(form["phone"].value)){
                document.getElementById("phoneError").textContent = "Phone number is not valid.";
                isValid = false; 
            }

            // Validate Enquiry Type, ... convert the checkbox collectio into an array
            if (![...form["enquiry"]].some(checkbox => checkbox.checked)){
                document.getElementById("phoneError").textContent = "Please select at least one type of enquiry";
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
    </script>
</body>
</html>