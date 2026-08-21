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
        $filename = "users.csv";
        if(file_exists($filename)){
            $handle = fopen($filename, "r");

            while(($data = fgetcsv($handle)) !== false){
                echo "<tr>";
                echo "<td>" . $data[0] . "</td>";
                echo "<td>" . $data[1] . "</td>";
                echo "<td>" . $data[2] . "</td>";
                echo "</tr>";
            }
            fclose($handle);
        }
        ?>
        </table>
    </body>
</html>