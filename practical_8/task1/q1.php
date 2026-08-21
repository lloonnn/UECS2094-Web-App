<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h2>User List</h2>
        <table border="1" cellpadding="8">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        <?php
        $filename = "users.txt";
        if(file_exists($filename)){
            $lines = file($filename);
            foreach($lines as $line){
                $segments = explode("\t", trim($line));
                echo "<tr>";
                echo "<td>" . $segments[0] . "</td>";
                echo "<td>" . $segments[1] . "</td>";
                echo "<td>" . $segments[2] . "</td>";
                echo "</tr>";
                
            }
        }
        ?>
        </table>
    </body>
</html>