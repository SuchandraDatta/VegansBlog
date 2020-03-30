<!DOCTYPE html>
<html>
    <head><meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1"></head>
    <body>
        <?php
        if($_COOKIE["userName"]==null)
        {
            header('Location: loginForm.php');
        }
            $con=mysqli_connect('localhost', 'shaun', 'test', 'VegansBlog');
            if($con){
                echo "Connected";
            }
            else
            {
                echo mysqli_connect_error();
            }

            $sql='SELECT * FROM recipes';
            $result=mysqli_query($con, $sql);
            $recip=mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo $recip[0]["ingredients"]
            /*
            <h6>Ingredients: </h6>
                             <ul>
                                <?php foreach(explode(',', $content["ingredients"]) as $ing){?>
                                        <?php if($ing != NULL){?>
                                                 <li><?php echo $ing?></li>
                                         <?php }?>
                                <?php }?>
                             </ul>
             */
        ?>
        <style>
            .eachBox
            {
                background-color:  #27547b00;
                height: 50vh;  
                text-align: center;
                border-radius: 1em;
                box-shadow: 0 0 20px 5px white;
                color: white;
            }
            .topBand
            {
                background-color: #005180;
                width: 100%;
                height: 20%;
                border-radius: 1em;
            }
            .recipeBody
            {
                
                text-align: center;
                width: 100%;
                background-color: #0404049c;
                position: relative;
                top: 10%;
                height: 30vh;
            }
            body
            {
                background-image: url('browseRecipesBackpic.jpg');
                background-size: cover;
            }
            .shtDesc
            {
                height: 15vh;
                text-align: center;
            }
            .viewDetails, .deleteDetails, .editDetails
            {
                background-color: blue;
                border-radius: 2em;
                padding: 1vh;
            }
            .deleteDetails
            { 
                background-color: red;
            }
            .editDetails
            {
                margin-bottom: 2vh;
                position: relative;
            }
            a:link, a:visited
            {
                color: white;
            }
            a:hover
            {
                text-decoration: none;
            }
            @media screen and (max-width: 360px)
            {
                .eachBox
                {
                    height: 50vh;  
                    width: 90vw;
                }
            } 
            /*header stuff*/
            header
            {
                height: 10vh;
                width: 100%;
                background-image: url('./headerBackpic.gif')
                
            }
            header ul
            {
                list-style-type: none;
               
            }
            header ul li a
            {
                color: white;
                font-weight: bolder;
                float: left;
                display: block;
                margin: 3vh 5vh;
                
            }
            header ul li a:hover
            {
                text-decoration: none;
                color: black;
            }
            @media screen and (max-width: 414px)
            {
                header ul li a
                {
                     margin: 3vh 2vh;
                     font-size: 13px;
                }
            }  
        </style>
         <header>
            <ul>
                <li><a href="./indexVegansBlog.php">HOME</a></li>
                <li><a href="./recipeForm.php">WRITE RECIPE</a></li>
                <li><a href="./viewRecipes.php">BROWSE RECIPES</a></li>
            </ul>
        </header>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <?php foreach($recip as $content){?>
                <div class="col-md-3">
                    <div class="mt-5 eachBox" >
                        <div class="topBand">
                            <h6><br><?php echo htmlspecialchars($content["title"])?></h6>
                        </div>
                            <div class="recipeBody">
                             
                             <p class="shtDesc"><?php echo $content["shortDescription"]?></p>
                             <a class="viewDetails" style="color: white;" href="viewDetails.php?id=<?php echo $content["id"];?>">View details</a>
                             <a class="deleteDetails"   href="deleteDetails.php?id=<?php echo $content["id"];?>">Delete recipe</a><br/><br/>
                             <a class="editDetails"  href="editDetailsForm.php?id=<?php echo $content["id"];?>">Edit recipe</a>
                            </div>
                    </div>
                </div>
                <?php }?>
            </div>
            
        </div>
    </body>
</html>