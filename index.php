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
        <title>SER322 Pantry Project - Login</title>
        <link rel="stylesheet" href="styles/styles.css">

    </head>
    <body>
        <?php
            require_once '/config/config.php';
            setUp($conn);
            mysqli_select_db($conn, "ser322Pantry");
        ?>
        <h1>Welcome to the SER322 Pantry Project</h1>
        <h2>Created By Team 03</h2>
        <p>Login or create a new user.</p>
        <form action="pages/welcome.php" method="post">
            User Email:<br><input type="test" name="userEmail"><br>
            Password:<br><input type="password" name="password"><br>
            <input type="submit" name="submit" value="Login!"><br>
            <button type="button" name="create_user" onclick="window.location='create_user.php'">Create New User</button><br>
        </form>
        
     
    </body>
</html>
