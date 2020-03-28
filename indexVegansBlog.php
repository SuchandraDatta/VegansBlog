<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            
        <style>
            body
            {
                background-color: #bcecfd;
            }
            #landing-page-half
            {
                background-color: black;
                background-image: url('./food1.jpg');
                
                background-attachment: fixed;
                background-size: cover;
                height: 70vh;
                width: 100%;
                text-align: center;
                color: white;
            }
            #heading
            {
                position: relative; 
                top: 30%; 
                height: 40%;
                width: 60%;
                margin: auto;
                background-color: rgba(255,255,255,0.3);
                font-weight: bolder;
            }
            #heading p
            {
                font-size: 1em;
            }
            .box1
            {
                background-color: #bcecfd;;
                border: 2px solid gray;
                height: 95vh;
                box-shadow: 0 0 20px 5px rgba(0,0,0,0.5);

            }
            .box1 p
            {
                padding: 4%;
                font-weight: bolder;
            }
            .linkButton
            {
                text-align: center;
                margin: auto;
                height: 10%;
                width: 40%;
                border-radius: 2em;
                background-color: aliceblue;
                padding: 3%;
                box-shadow: 0 0 30px 5px rgba(0,0,0,0.3);
            }
            @media screen and (max-width: 360px)
            {
                #landing-page-half
                {
                height: 100vh;
                width: 100%;
                }
                #heading
                {
                height: 40%;
                width: 80%;
                }
                .box1
                {
                height: 70vh;
                }
                .linkButton
                {   
                    font-size: 12px;
                }
            }
        </style>
    </head>
    <body>
		<?php
			$name=$_COOKIE["userName"]??"";
			echo $name;
		?>
        <div id="landing-page-half">
            <div id="heading">
                <h1><br/>VEGAN'S BLOG</h1>
                <p>A place to share your latest culinary escapades which are nutritous as well as contributes towards a sustainable future.</p>
            </div>
            <div class="loginButtons" style="position: relative; top: 30vh;">
                
                
				<?php if($name!=""){ ?>
					<a href="./logoutVB.php">LOGOUT</a>
				<?php } else { ?>
					<a href="./loginForm.php">LOGIN</a>
					<a href="./register.php">REGISTER</a>
				<?php } ?>
                
            </div>
        </div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-6">
                    <div class="m-5 box1">
                        <img src="./food2.jpg" alt="Browse recipes" height="100px" width="100%" class="img-fluid">
                        <p>Browse through our selection of more than 10 recipes on varied categories, designed to satisfy your vegan cravings as well as satisfy your nutritional demands.</p>
                        <div class="linkButton"><a href="./viewRecipes.php" >BROWSE RECIPES</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-5 box1" style="background-image: url('./food3.jpg'); background-size: cover; color: white; text-align: center; padding: 3%; position: relative;">
                        <p style="position: relative; top: 30%;">Lorem ipsum dolor sit amet consectetur adipisicing elit. In quasi harum dignissimos optio magnam deleniti ex architecto maiores et</p>
                        <div class="linkButton" style="position: relative; top: 40%;"><a href="./recipeForm.php" >WRITE YOUR RECIPE</a></div>
                    </div>
                </div>
            </div>
           <div style="position: relative; bottom: 10%; height: 10vh;"></div>
        </div>
    </body>
    
</html>