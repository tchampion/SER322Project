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
        <title>SER322 Pantry Project - Welcome</title>
        <link rel="stylesheet" href="../styles/styles.css">

    </head>
    <body>
        <?php
            require '/../config/config.php';
            mysqli_select_db($conn, "ser322Pantry");
            
            if(isset($_POST['userEmail']) && isset($_POST['password'])){
                $sql = "SELECT * FROM users WHERE ( email = '" . $_POST['userEmail']  . "')";
                
                $result = mysqli_query($conn, $sql);
                
               if($result->num_rows != 1){
                   echo '<script type="text/javascript">';
                   echo 'alert("User Not Found!");';
                   echo 'location.replace("/ser322Project/index.php");';
                   echo '</script>';
               }
               else{
                   $row = $result->fetch_assoc();
                   $email = $row["email"];
                   $password = $row["pass"];
                   if($password != $_POST["password"]){
                       echo '<script type="text/javascript">';
                       echo 'alert("Incorrect Password!");';
                       echo 'location.replace("/ser322Project/index.php");';
                       echo '</script>';
                   }
                   else{
                       $userID = $row["user_id"];
                       $firstName = $row["firstName"];
                       $lastName = $row["lastName"];
                       echo "<h1>Welcome $firstName!</h1>";
                       
                       require '/main_menu.php';
 
                   }
               }
            }
            
        ?>
        
    </body>
</html>
