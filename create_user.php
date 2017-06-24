<!DOCTYPE html>
<!--
/* 
 * SER 322 Team 03 Pantry Project
 * Terin Champion
 * Hajar Boughoula
 * Nergal Givarkes
 */
/**
 * Author:  Terin
 * Created: Jun 18, 2017
 */
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SER322 Pantry Project - Create User</title>
        <link rel="stylesheet" href="styles/styles.css">

    </head>
    <body>
        <?php
            require_once '/config/config.php';
            mysqli_select_db($conn, "ser322Pantry");
        ?>
        <h1>Create User</h1>

        <p>Enter User Information</p>
        <form action="create_user.php" method="post">
            User Email:<br><input type="text" name="userEmail"><br>
            First Name:<br><input type="text" name="firstName"><br>
            Last Name:<br><input type="text" name="lastName"><br>
            Password:<br><input type="password" name="password"><br>
            <input type="submit" name="submit" value="Create User"><br>
            <button type="button" name="index" onclick="window.location='index.php'">Return to Login</button><br>
        </form>
        
        <?php
            if(isset($_POST['userEmail']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password'])){
                $sql = "INSERT INTO users (firstName, lastName, email, pass) VALUES ( '" . $_POST['firstName'] ."', '" . 
                        $_POST['lastName'] . "', '" . $_POST['userEmail'] . "', '" . $_POST['password'] . "')";
                
                while(mysqli_more_results($conn)){mysqli_next_result($conn);}
                
                $conn->query($sql);
                
                echo 'User ' . $_POST['userEmail'] . ' created<br>';
                echo 'Return to Login Page and LOGIN!';
            }
        ?>
        
     
    </body>
</html>
