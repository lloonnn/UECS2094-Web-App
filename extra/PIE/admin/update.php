<!DOCTYPE html>
<head>
    <title>Control panel</title>
    <link rel="stylesheet" href="../style/mystyle.css">
</head>

<body>    
    <?php include("../includes/header.php")?>
    <?php include("../includes/navigation.php")?>

    <div id="contentWrapper" class="content">
        <div>
        <h2>Update Announcement</h2>
        <?php 
            $dbHost = "localhost";
            $dbUser = "root";
            $dbPass = "";
            $dbName = "uecs2094_pie";
            $port = 3306;
            $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $port);
            if ($_SERVER["REQUEST_METHOD"] !== "POST"){
                // REQUEST METHOD is not post, display the form with old values.
                $id =  $_GET["id"];
                $sql = "SELECT * FROM announcement WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                mysqli_close($conn);
        ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="<?php echo $row["subject"]; ?>"><br>
            
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="8" cols="60"><?php echo $row["message"]; ?></textarea>

            <label for="type">Post Type</label>
            <select id="type" name="type">
                <option value="P" <?php echo $row["type"] === 'P' ? 'selected' : ''; ?>>Project Updates</option>
                <option value="T" <?php echo $row["type"] === 'T' ? 'selected' : ''; ?>>Traffic Announcement</option>
            </select>

            <br><br><br><br>
            <button type="submit">Update Post</button>
        </form>

        <?php    
            }else{
                // REQUEST_METHOD is post, store into database
                $id = $_POST["id"];
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $type = $_POST["type"];

                if($id <= 0 || $subject === "" || $message === "" || $type ===""){
                    echo "<p>Invalid input. Please fill in all fields.</p>";
                }else{
                    if(!$conn){
                        echo "<p>Could not connect to the database.</p>";
                    }else{
                        $sql = "UPDATE announcement SET subject = '$subject', message = '$message', type='$type' WHERE id = $id";

                        if (mysqli_query($conn, $sql)){
                            echo "<p>Post updated successfully.</p>";
                        }else{
                            echo "<p>Faild to update post.</p>";
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