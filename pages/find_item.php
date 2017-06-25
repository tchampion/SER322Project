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
        <title>SER322 Pantry Project - Find Item</title>
        <link rel="stylesheet" href="../styles/styles.css">

    </head>
    
        <?php
            session_start();
            require '/../config/config.php';
            mysqli_select_db($conn, "ser322Pantry");
            
            echo "<h1>Welcome " . $_SESSION['firstName'] ."!</h1>";
            require '/main_menu.php';
        ?>
        <body>
            <form action="find_item.php" method="post">
                Search Item:<br><input type="text" name="itemName"><br>
            </form>
            <?php
                if(isset($_POST['itemName'])){
                    
                
                //Search for Item
                $sql = "SELECT item.item_name, item.brand, item.amount "
                    . "FROM item "
                    . "WHERE (item.item_name LIKE '%" . $_POST['itemName'] . "%' )";
                
            $result = mysqli_query($conn, $sql);
            
            if($result->num_rows == 0){
               echo '<br><p>No Items with that Name!  <br></p>';
            }
            else{

               echo '<br><table><tr><th>Item Name</th><th>Brand</th><th>Amount</th></tr>';
               while($row = $result->fetch_assoc()){
                   $brand = $row["brand"];
                   $itemName = $row["item_name"];
                   $amount = $row["amount"];

                   //Print Each Item
                   echo "<tr><td>$itemName</td><td>$brand</td><td>$amount</td></tr>";

               }

            }
            }
            
        ?>
        
    </body>
</html>
