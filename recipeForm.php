<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
<?php   $title_error="";
        $shortDescription_error="";
        $longDescription_error="";
        $ingredients_error="";
        echo "OVER HERE";
        $title="";
        /*$flag=0;
        if(isset($_REQUEST["submit"])){
            echo "INSIDE THIS PLACE";
            $title=$_REQUEST["title"];
            if(strlen($title)>255)
            { $title_error="Title must be within 255 characters<br/>";$flag=1;}
            else
            $title_error="Valid title";

            $shortDesc=$_REQUEST["shortDescription"];
            if(strlen($shortDesc)>255)
            { $shortDescription_error="Short desc must be within 255 characters<br/>";$flag=1;}
            else
            $shortDescription_error="Valid shortDesc";

            $ingredients=$_REQUEST["ingredients"];
            if(strlen($ingredients)>255)
            { $ingredients_error="<255 needed<br/>";$flag=1;}
            else
            $ingredients_error="Valid ingre<br/>";

            $longDescription=$_REQUEST["longDescription"];
            if(strlen($longDescription)>255)
            { $longDescription_error="<255 needed<br/>"; $flag=1;}
            else
            $longDescription_error="Valid longDescription<br/>";*/
            if(isset($_REQUEST["submit"]))
            {
                include("./formValidation.php");
                if($flag==0)
                {
                    $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
                    if($con)
                    {
                        echo "CONNECTED";
                    }
                    else
                    {
                        echo "NOT CONNECTED";
                    }
                    $title=mysqli_real_escape_string($con, $_REQUEST["title"]);
                    $shortDescription=mysqli_real_escape_string($con, $_REQUEST["shortDescription"]);
                    $longDescription_error=mysqli_real_escape_string($con, $_REQUEST["longDescription"]);
                    $ingredients=mysqli_real_escape_string($con, $_REQUEST["ingredients"]);
    
                    $sql="INSERT INTO recipes(title, shortDescription, longDescription, ingredients) VALUES('$title', '$shortDescription','$longDescription_error','$ingredients')";
                    mysqli_query($con, $sql);
                    header('Location:index.html');
                } 
            }
           
        
       
           
        ?>
    <form name="recipeWrite" action="recipeForm.php" method="POST">
        <input type="text" name="title" value="" placeholder="Recipte title" required>
            <h1><?php echo htmlspecialchars($title_error)?></h1>
        <input type="text" name="shortDescription" value="" placeholder="Short Description" required>
        <h1><?php echo htmlspecialchars($shortDescription_error)?></h1>
        <br/>
        <textarea name="ingredients" rows="10" cols="50" placeholder="Ingredients(like 1gm paneer, 2gm tofu)" required></textarea>
        <h1><?php echo htmlspecialchars($ingredients_error)?></h1>
        <textarea name="longDescription" rows="10" cols="10" placeholder="Your recipe" required></textarea>
        <br/><h1><?php echo htmlspecialchars($longDescription_error)?></h1>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>
