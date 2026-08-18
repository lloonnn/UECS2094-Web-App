<!DOCTYPE HTML>
<html>  
<head>
<title>Contact Us
</title>
 <link rel="stylesheet" href="../style/mystyle5.css">
</head>
<body>
<?php include('../includes/header.php'); ?>
<?php include('../includes/navigation.php'); ?>


<div id="contentWrapper" class="content">

<form action="post-message.php" method="post" id="contactForm">

<div id="nameInput">

<label for = "nam" > Name: </label><input type="text" id = "nam" name="name">

<div class="error"></div>
</div>

<div id="emailInput">
E-mail: <input type="text" name="email">
<div class="error"></div>
</div>

<div id="phoneInput">
Phone Number: <input type="tel" name="phone">
<div class="error"></div>
</div>

<div id="enquiryInput">
Type of Enquiry:
<input type="checkbox"> General Enquiry
<input type="checkbox"> Complaints
<input type="checkbox"> Suggestions
<div class="error"></div>
</div>

<div id="subjectInput">
Subject:<br>
 <textarea name="message" rows="10" cols="30"></textarea>
<div class="error"></div>
</div>

<input type="submit" value="Send">

</form>

</div>

<?php include('../includes/footer.php'); ?>

<script src="validation.js"></script>

</body>
</html>
