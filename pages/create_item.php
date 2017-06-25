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
        <title>SER322 Pantry Project - Create Item</title>
        <link rel="stylesheet" href="../styles/styles.css">

    </head>
    
        <?php
            session_start();
            require '/../config/config.php';
            mysqli_select_db($conn, "ser322Pantry");
            
            echo "<h1>Welcome " . $_SESSION['firstName'] ."!</h1>";
            require '/main_menu.php';
            echo "<h2>CREATE ITEM</h2>";
        ?>
        <body>
            <form action="create_item.php" method="post">
                Item Name:<br><input type="text" name="insertItem"><br><br>
                Item Brand:<br><input type="text" name="itemBrand"><br><br>
                Item Description:<br><input type="text" name="itemDescription"><br><br>
                Item Amount:<br><input type="text" name="itemAmount"><br><br>
                <input type="submit" name="submit" value="Add Item"><br><br>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    
                    //Verify Item Name Entered
                    if($_POST['insertItem'] == ""){
                        echo "<br>Must Enter Item Name.<br>";
                    }
                    else{
                    //Insert Item
                    $sql = "INSERT INTO item( "
                    . "item_name, brand, description, amount) "
                    . "VALUES ('" . $_POST['insertItem'] . "', '" . $_POST['itemBrand']
                    .  "', '" . $_POST['itemDescription'] . "', '" . $_POST['itemAmount'] 
                    .  "')";
                
                    $result = mysqli_query($conn, $sql);
                    
                    echo $_POST['insertItem'] . " added to database";
                    }
          
                }
            
        ?>
        
    </body>
</html>
