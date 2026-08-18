<!DOCTYPE html>
<html>
<head>
    <title>About page</title>
    <link rel="stylesheet" href="../style/mystyle.css">
</head>

<body>    
    <?php include("../includes/header.php")?>
    <?php include("../includes/navigation.php")?>

    <div id="contentWrapper" class="content">
        <form id="contactForm" action="post-message.php" method="post">
            <!--<label for="salutation">Salutation:</label> -->
            <label for="salutation">Salutation:</label>
            <select id="Sal" name="salutation" required>
                <option disabled selected value>-- Select a Salutation--</option>
                <option value="mr">Mr</option>
                <option value="ms">Ms</option>
                <option value="mrs">Mrs</option>
                <option value="dr">Dr</option>
            </select>
            <div id="salutationError" class="error"></div>

            <label for="name">Name:</label> 
            <input type="text" id="name" name="name" required>
            <div id="nameError" class="error"></div>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <div id="emailError" class="error"></div>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <div id="phoneError" class="error"></div>

            <label for="enquiry">Type of Enquiry:</label>
            <input type="checkbox" name="enquiry" value="General Enquiry">General Enquiry
            <input type="checkbox" name="enquiry" value="Complaints">Complaints
            <input type="checkbox" name="enquiry" value="Suggestions">Suggestions
            <div id="enquiryError" class="error"></div>

            <label for="message">Subject:</label> <br>
            <textarea id="message" name="message" rows="10" cols="30" required></textarea>
            <div id="messageError" class="error"></div>

            <input type="button" value="Send" onclick="validateForm()">
        </form>
    </div>
    
    <?php include("../includes/footer.php")?>

    <script src="./validate.js"></script>
</body>
</html>