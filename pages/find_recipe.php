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
        <title>SER322 Pantry Project - Find Recipe</title>
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
            <form action="find_recipe.php" method="post">
                Search Recipe:<br><input type="text" name="recipeName"><br>
            </form>
            <?php
                if(isset($_POST['recipeName'])){
                    
                
                //Search for Recipe
                $sql = "SELECT recipe.title, recipe.recipe_id, recipe.likes, "
                    . "(SELECT COUNT(d.user_id) FROM user_recipe d WHERE d.recipe_id = recipe.recipe_id) AS downloads "    
                    . "FROM recipe "
                    . "WHERE (recipe.title LIKE '%" . $_POST['recipeName'] . "%' )";
                
            $result = mysqli_query($conn, $sql);
            
            if($result->num_rows == 0){
               echo '<br><p>No Recipes with that Name!  <br></p>';
            }
            else{

               echo '<br><table><tr><th>Recipe Title</th><th>Likes</th><th>Downloads</th></tr>';
               while($row = $result->fetch_assoc()){
                   $recipeID = $row["recipe_id"];
                   $title = $row["title"];
                   $likes = $row["likes"];
                   $downloads = $row["downloads"];

                   //Print Each Item
                   echo "<tr><td><a href=\"recipe_info.php?recipe_id=" . $_SESSION['recipeID'] . "\">$title</td><td>$likes</td><td>$downloads</td></tr>";

               }

            }
            }
            
        ?>
        
    </body>
</html>
