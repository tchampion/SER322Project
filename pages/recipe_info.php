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
        <title>SER322 Pantry Project - Recipe Info</title>
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
            <?php
            $_SESSION['recipeID'] = $_GET['recipe_id'];
            
            //Select Recipe Info
            $sql = "SELECT recipe.title, recipe.instructions, recipe.servings "
                    . "FROM recipe "
                    . "WHERE (recipe.recipe_id = " . $_SESSION['recipeID']  . ")";
                
            $result = mysqli_query($conn, $sql);
            
            if($result->num_rows == 0){
               echo '<br><p>No Recipe Found!  <br></p>';
            }
            else{

               $row = $result->fetch_assoc();
                   $recipe = $row["title"];
                   $servings = $row["servings"];
                   $instructions = $row["instructions"];
                   
                   //Print Recipe Info
                   echo "<div class=recipe id=recipe>";
                   echo "<h2 style=text-align:left>$recipe</h2>";
                   echo "<p style=text-align:left>This recipe serves: " . $servings . " People.<br></p>";
                   echo "<p style=text-align:left>Ingredients Required:<br></p>";
                   
                    //Select Recipes Ingredients
                    $sql = "SELECT ingredient.item_description, ingredient.quantity "
                            . "FROM ingredient "
                            . "WHERE (ingredient.recipe_id = " . $_SESSION['recipeID']  . ")";

                    $result = mysqli_query($conn, $sql);

                    if($result->num_rows == 0){
                       echo '<br><p>No Ingredients Found!  <br></p>';
                    }
                    else{
                        
                        echo "<ol style=text-align:left>";
                        while($row = $result->fetch_assoc()){
                           $ingredient = $row["item_description"];
                           $quantity = $row["quantity"];
                           
                           echo "<li>$ingredient: $quantity</li>";
                       }
                       echo "</ol>";
                   
                   echo "<p style=text-align:left><br>Instructions:<br>" . $instructions;
                   echo "</div>";
                    }

            }
            
        ?>
        
    </body>
</html>

