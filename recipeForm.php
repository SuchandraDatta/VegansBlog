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
            if($_COOKIE["userName"]=="")
            {
                header('Location:loginForm.php');
            }
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
                    $userName522=mysqli_real_escape_string($con, $_COOKIE["userName"]);

                    $sql="INSERT INTO recipes(title, shortDescription, longDescription, ingredients, userName522) VALUES('$title', '$shortDescription','$longDescription_error','$ingredients', '$userName522')";
                    mysqli_query($con, $sql);
                    header('Location:indexVegansBlog.php');
                } 
            }
           
        
       
           
        ?>
        <style>
            body
            {
                background-image: url('recipeFormBackpic.jpg');
                background-size: cover;
            }
            .formContainer
            {
                height: 140vh;
                width: 50vw;
                background-color: red;
                position: relative;
                margin-left: auto;
                margin-right: auto;
                padding: 2%;
                background: linear-gradient(to right, #8e2dec3d, #400ae1);
                border-radius: 1em;
                box-shadow: 0 0 20px 1px rgba(255,255,255,0.9);
            }
            input, textarea
            {
                position: relative;
                margin-left: 12vw;
                margin-top: 2%;
                width: 20vw;
                font-size: 18px;
                border: none;
                overflow: hidden;
                
            }
            input[type=text]
            {
                border-radius: 2em;
                text-align: center;
                height: 3em;
            }
             
            textarea
            {
                border-radius: 1em;
                text-align: center;
                height: 10em;
            }
            input[type=submit]
            {
                height: 3em;
                border-radius: 2em;
                position: relative;
                margin-top: 10vh;
                box-shadow: 0 0 25px 5px black;
                background-color: transparent;
                color: white;
            }
            input[type=submit]:hover
            {
                background: linear-gradient(to right, #8e2dec3d, #400ae1);
                color: white;
            }
            @media screen and (max-width: 414px)
            {
                .formContainer
                {
                height: 130vh;
                width: 70vw;
                }
                input, textarea
                {
                 
                margin-left: 9vw;
                margin-top: 3%;
                width: 50vw;
                }
            }
        </style>
    <div class="formContainer">
    <form name="recipeWrite" action="recipeForm.php" method="POST">
        <input type="text" name="title" value="" placeholder="Recipte title" required>
            <h6 style="color: red;"><?php echo htmlspecialchars($title_error)?></h6>
        <input type="text" name="shortDescription" value="" placeholder="Short Description" required>
        <h6 style="color: red;"><?php echo htmlspecialchars($shortDescription_error)?></h6>
        <br/>
        <textarea name="ingredients" rows="10" cols="50" placeholder="Ingredients(like 1gm paneer, 2gm tofu)" required></textarea>
        <h6 style="color: red;"><?php echo htmlspecialchars($ingredients_error)?></h6>
        <textarea name="longDescription" rows="10" cols="10" placeholder="Your recipe" required></textarea>
        <br/><h6 style="color: red;"><?php echo htmlspecialchars($longDescription_error)?></h6>
        <input type="submit" value="submit" name="submit">
    </form>
    </div>
</body>
</html>
