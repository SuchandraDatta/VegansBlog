<body>
    <?php include("./getID.php"); ?>
    <?php
         $title_error="";
         $shortDescription_error="";
         $longDescription_error="";
         $ingredients_error="";
    ?>
    <form name="editRecipe" action="editDetails.php" method="POST">
        <input type="text" name="title" value="<?php echo $this_recipe[0]["title"]?>" placeholder="Recipte title" required>
         
        <input type="text" name="id" value="<?php echo $this_recipe[0]["id"]?>" style="visibility: hidden;">  
        <input type="text" name="shortDescription" value="<?php echo $this_recipe[0]["shortDescription"]?>" placeholder="Short Description" required>
         
        <br/>
        <textarea name="ingredients" rows="10" cols="50" placeholder="Ingredients(like 1gm paneer, 2gm tofu)" required><?php echo $this_recipe[0]["ingredients"]?></textarea>
         
        <textarea name="longDescription" rows="10" cols="10" placeholder="Your recipe"  required><?php echo $this_recipe[0]["longDescription"]?></textarea>
        
        <input type="submit" value="submit" name="submit">
    </form>
</body>