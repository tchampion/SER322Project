<<<<<<< HEAD
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
        <title>SER322 Pantry Project - User Recipes</title>
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
            //Select User's Recipes
            $sql = "SELECT recipe.recipe_id, recipe.title, recipe.servings, recipe.likes, "
                    . "(SELECT COUNT(d.user_id) FROM user_recipe d WHERE d.recipe_id = recipe.recipe_id) AS downloads "
                    . "FROM recipe, users, user_recipe "
                    . "WHERE (users.user_id = user_recipe.user_id "
                    .   "AND user_recipe.recipe_id = recipe.recipe_id "
                    .   "AND users.user_id = " . $_SESSION['userID']  . ")";
                
            $result = mysqli_query($conn, $sql);
            
            if($result->num_rows == 0){
               echo '<br><p>No Downloaded Recipes!  <br>Go Find Something To Eat!!!</p>';
            }
            else{

               echo '<br><table><tr><th>Recipe</th><th>Servings</th><th>Likes</th><th>Downloads</th></tr>';
               while($row = $result->fetch_assoc()){
                   $_SESSION['recipeID'] = $row["recipe_id"];
                   $recipe = $row["title"];
                   $servings = $row["servings"];
                   $likes = $row["likes"];
                   $downloads = $row["downloads"];
                   
                   //Print Each Item
                   echo "<tr><td><a href=\"recipe_info.php?recipe_id=" . $_SESSION['recipeID'] . "\">$recipe</a></td><td>$servings</td><td>$likes</td><td>$downloads</td></tr>";

               }

            }
            
        ?>
        
    </body>
</html>

=======

<!DOCTYPE html>
<!--
/* 
 * SER 322 Team 03 Pantry Project
 * Terin Champion
 * Hajar Boughoula
 * Nergal Givarkes
 */
/**
 * Author:  Nergal
 * Created: Jun 22, 2017
 */
-->
<html>
    <head>
        
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/styles.css">
    
    </head>
    
    <body>
    
    <h1>--User Recipe--</h1>
    
    <table id="table1">
    
    <tr id="tr1">
    <td id="td1"> View Recipes</td>
    </tr>
    
    <tr>
    <td id="td2">Enter recipeID                 
    <input id="input1" type="text" name="recipeID" size="1" maxlength="4"/> </td>
    </tr>
    
    <tr>
    <td id="td3">
    <input type="submit" value="View" /></td>
    </tr> 
    
    </table>     
   
    
    <table id="table1">
    
    <tr id="tr1">
        <td id="td4">Item</td>
        <td id="td5">Description</td> 
    </tr>

    <tr>
    <td id="td2">Name</td>
    <td><input id="input1"  type="text" name="NameIn"  size="3" maxlength="" /></td>
    </tr>

    <tr>
    <td id="td2">Recipe ID</td>
    <td><input  id="input1" type="text" name="RecIn"  size="3" maxlength="" /></td> 
    </tr>
    
    <tr>
    <td id="td2">Servings</td>
    <td><input id="input1"  type="text" name="SerIn"  size="3" maxlength="" /></td> 
    </tr>
    
    <tr>
    <td id="td2">Likes</td>
    <td><input id="input1"  type="text" name="LikeIn"  size="3" maxlength="" /></td> 
    </tr>

    <tr>
    <td id="td2">Instructions</td>
    <td><input id="input1"  type = "test" name = "InstIn"  size="0" maxlength="" /></td>
    </tr> 
    
    </table> 
     
    <tr>
    <td> 
    <a id="Home" href="./welcome.php" >HOME</a></td>
    </tr>
    
    
        
    </body>
    
</html>
>>>>>>> origin/master
