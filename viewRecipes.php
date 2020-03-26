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
        ?>
        <style>
            .eachBox
            {
                background-color: #277084;
                height: 50vh; color: white; 
                text-align: center;
            }
            .eachBox ul 
            {
                list-style-type:none;
            }
            .topBand
            {
                background-color: green;
                width: 100%;
                height: 20%;
            }
            .recipeBody
            {
                
                text-align: center;
                width: 100%;
                background-color: #288886;
                position: relative;
                top: 10%;
            }
        </style>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <?php foreach($recip as $content){?>
                <div class="col-md-3">
                    <div class="mt-5 eachBox" >
                        <div class="topBand">
                            <h6><br><?php echo htmlspecialchars($content["title"])?></h6>
                        </div>
                            <div class="recipeBody">
                             <ul>
                                <?php foreach(explode(',', $content["ingredients"]) as $ing){?>
                                        <?php if($ing != NULL){?>
                                                 <li><?php echo $ing?></li>
                                         <?php }?>
                                <?php }?>
                             </ul>
                             <p><?php echo $content["shortDescription"]?></p>
                             <a style="color: white;" href="viewDetails.php?id=<?php echo $content["id"];?>">View details</a>
                             <a style="color: red;" href="deleteDetails.php?id=<?php echo $content["id"];?>">Delete recipe</a>
                             <a style="color: blue;" href="editDetailsForm.php?id=<?php echo $content["id"];?>">Edit recipe</a>
                            </div>
                    </div>
                </div>
                <?php }?>
            </div>
            
        </div>
    </body>
</html>