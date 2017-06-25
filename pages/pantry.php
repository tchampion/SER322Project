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
        <title>SER322 Pantry Project - Pantry</title>
        <link rel="stylesheet" href="../styles/styles.css">

    </head>
    
        <?php
            session_start();
            require '/../config/config.php';
            mysqli_select_db($conn, "ser322Pantry");
            
            echo "<h1>Welcome " . $_SESSION['firstName'] ."!</h1>";
            require '/main_menu.php';
            echo "<h2>USER PANTRY</h2>";
        ?>
        <body>
            <?php
            //Select User's Items in Pantry
            $sql = "SELECT pantry.pantry_id, item.item_name, pantry_item.amount "
                    . "FROM item, pantry, pantry_item, users "
                    . "WHERE (users.user_id = pantry.user_id "
                    .   "AND pantry.pantry_id = pantry_item.pantry_id "
                    .   "AND pantry_item.item_id = item.item_id "
                    .   "AND users.user_id = " . $_SESSION['userID']  . ")";
                
            $result = mysqli_query($conn, $sql);

            if($result->num_rows == 0){
               echo '<br><p>No Items in Pantry!  <br>Go Shopping!!!</p>';
            }
            else{

               echo '<br><table><tr><th>Pantry</th><th>Item Name</th><th>Amount</th></tr>';
               while($row = $result->fetch_assoc()){
                   $pantry = $row["pantry_id"];
                   $itemName = $row["item_name"];
                   $amount = $row["amount"];

                   //Print Each Item
                   echo "<tr><td>$pantry</td><td>$itemName</td><td>$amount</td></tr>";

               }

            }
            
        ?>
        
    </body>
</html>
