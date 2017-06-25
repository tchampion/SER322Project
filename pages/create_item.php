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
        ?>
        <body>
            <form action="create_item.php" method="post">
                Item Name:<input type="text" name="itemName"><br>
                Item Brand:<input type="text" name="itemName"><br>
                Item Description:<input type="text" name="itemName"><br>
                Item Amount:<input type="text" name="itemName"><br>
                <input type="submit" id="button" name="submit" value="Add Item"><br>
            </form>
            <?php
                if(isset($_POST['button'])){
                    
                    //Verify Item Name Entered
                    if($_POST['itemName'] == null){
                        echo "<br>Must Enter Item Name.<br>";
                    }
                    else{
                    //Insert Item
                    $sql = "INSERT INTO item( "
                    . "FROM item "
                    . "WHERE (item.item_name LIKE '%" . $_POST['itemName'] . "%' )";
                
                    $result = mysqli_query($conn, $sql);
                    }
          
                }
            
        ?>
        
    </body>
</html>
