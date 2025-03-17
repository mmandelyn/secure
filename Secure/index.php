<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "secure";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT password FROM users WHERE username = 'admin'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "hash: " . $row["password"] . "<br>";
                $db_password = $row["password"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        
        echo "<br> call password_hash<br>";
        $result = password_hash("pwd", PASSWORD_DEFAULT);
        echo "Result is $result";
                
        echo "<br> call password_valid<br>";
        $valid = password_verify("pwd", $db_password);
        echo "Valid is $valid";
        ?>
    </body>
</html>
