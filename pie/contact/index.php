<!DOCTYPE html>
<head>
    <title>About page</title>
</head>

<body>    
    <?php include("../includes/header.php")?>
    <?php include("../includes/navigation.php")?>

    <div id="contentWrapper" class="content">
        <form action="post-message.php" method="post">
            <label for="salutation">Salutation</label>
            <select id="salutation" name="salutation">
                <option value="">-- Select --</option>
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
                <option value="Dr">Dr</option>
            </select>

            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email Address">
            <input type="text" name="phone" placeholder="Phone Number">
            <input type="text" name="subject" placeholder="Subject">

            <label for="enquiry">Type of Enquiry</label>
            <select id="enquiry" name="enquiry">
                <option value="">-- Select --</option>
                <option value="General">General</option>
                <option value="Complaint">Complaint</option>
                <option value="Suggestion">Suggestion</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
    
    <?php include("../includes/footer.php")?>

</body>