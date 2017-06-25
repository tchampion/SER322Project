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
        <title>SER322 Pantry Project - Shopping List</title>
        <link rel="stylesheet" href="../styles/styles.css">

    </head>
    
        <?php
            session_start();
            require '/../config/config.php';
            mysqli_select_db($conn, "ser322Pantry");
            
            echo "<h1>Welcome " . $_SESSION['firstName'] ."!</h1>";
            require '/main_menu.php';
            echo "<h2>USER SHOPPING LIST</h2>";
        ?>
        <body>
            <?php
            //Select User's Items in Shopping List
            $sql = "SELECT shopping_list.shopping_list_id, item.item_name, shopping_list_item.amount "
                    . "FROM item, shopping_list, shopping_list_item, users "
                    . "WHERE (users.user_id = shopping_list.user_id "
                    .   "AND shopping_list.shopping_list_id = shopping_list_item.shopping_list_id "
                    .   "AND shopping_list_item.item_id = item.item_id "
                    .   "AND users.user_id = " . $_SESSION['userID']  . ")";
                
            $result = mysqli_query($conn, $sql);

            if($result->num_rows == 0){
               echo '<br><p>No Items in Shopping List!  <br>Go Eat Some Food!!!</p>';
            }
            else{

               echo '<br><table><tr><th>Shopping List</th><th>Item Name</th><th>Amount</th></tr>';
               while($row = $result->fetch_assoc()){
                   $shoppingList = $row["shopping_list_id"];
                   $itemName = $row["item_name"];
                   $amount = $row["amount"];

                   //Print Each Item
                   echo "<tr><td>$shoppingList</td><td>$itemName</td><td>$amount</td></tr>";

               }

            }
            
        ?>
        
    </body>
</html>

