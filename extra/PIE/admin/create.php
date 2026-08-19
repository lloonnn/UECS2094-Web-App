<!DOCTYPE html>
<head>
    <title>Control panel</title>
    <link rel="stylesheet" href="../style/mystyle.css">
</head>

<body>    
    <?php include("../includes/header.php")?>
    <?php include("../includes/navigation.php")?>

    <div id="contact-form-wrapper" class="contact-form">
        <div>
        <h2>Create New Announcement</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] !== 'POST'){
        // Request method is not post, display the empty form
        ?>

            <form action="create.php" method="post">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject"><br>
                
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="8" cols="60"></textarea>

                <label for="type">Post Type</label>
                <select id="type" name="type">
                    <option value="P">Project Updates</option>
                    <option value="T">Traffic Announcement</option>
                </select>

                <br><br><br><br>
                <button type="submit">Create Post</button>
            </form>

        <?php 
            }else{
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $type = $_POST["type"];

                if($subject === "" || $message === "" || $type ===""){
                    echo "<p>Please fill in all fields.</p>";
                }else{
                    $dbHost ="localhost";
                    $dbUser = "root";
                    $dbPass = "";
                    $dbName = "uecs2094_pie";
                    $dbPort = 3306;
                    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

                    if(!$conn){
                        die("Could not connect to the databse: ".mysqli_connect_error());
                    }else{
                        $sql = "INSERT INTO announcement (subject, message, type, posted) VALUES('$subject', '$message', '$type', NOW())";

                        if(mysqli_query($conn, $sql)){
                            echo "<p>Post created successfully.</p>";
                        }else{
                            echo "<p>Failed to create post.</p>";
                        }

                        mysqli_close($conn);
                    }
                }
            }
        ?>
        <p><a href="index.php">Back to index</a></p>
        </div>
    </div>
    <?php include("../includes/footer.php")?>
</body>