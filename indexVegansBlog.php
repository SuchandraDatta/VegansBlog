<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            
        <style>
            body
            {
                background-color: black;
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
                background-color: black;
                border: 5px inset white;
                height: 95vh;
                box-shadow: 0 0 20px 5px rgba(255,255,255,0.5);

            }
            .box1 p
            {
                padding: 4%;
                font-weight: bolder;
                color: white;
            }
            .linkButton
            {
                text-align: center;
                margin: auto;
                height: 10%;
                width: 40%;
                border-radius: 2em;
                background: linear-gradient(to right, #8e2dec, #400ae1);
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
            #loginButton
            {
                height: 5vh;
                width: 5vh;
                border-radius: 2em;
                background-color: #0d809291;
                padding: 2vh;
                margin: 5vh;
            }
            #loginButton a, a:visited
            {
                color: white;
                font-weight: bolder;
            }
            .loginButtons
            {
                position: relative; top: 30vh;
            }
            @media screen and (max-width: 414px)
            {
                .loginButtons
                {
                    top: 50vh;
                }
            }
        </style>
    </head>
    <body>
		<?php
			$name=$_COOKIE["userName"]??"";
			echo $name;
		?>
        <header>
            <ul>
                <li><a href="./indexVegansBlog.php">HOME</a></li>
                <li><a href="./recipeForm.php">WRITE RECIPE</a></li>
                <li><a href="./viewRecipes.php">BROWSE RECIPES</a></li>
            </ul>
        </header>
        <div id="landing-page-half">
            <div id="heading">
                <h1><br/>VEGAN'S BLOG</h1>
                <p>A place to share your latest culinary escapades which are nutritous as well as contributes towards a sustainable future.</p>
            </div>
            <div class="loginButtons">
                
                
				<?php if($name!=""){ ?>
					<a href="./logoutVB.php" id="loginButton">LOGOUT</a>
				<?php } else { ?>
					<a href="./loginForm.php" id="loginButton">LOGIN</a>
					<a href="./register.php" id="loginButton">REGISTER</a>
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
                        <div class="linkButton" style="position: relative; top: 40%;"><a href="./recipeForm.php" >WRITE RECIPE</a></div>
                    </div>
                </div>
            </div>
           <div style="position: relative; bottom: 10%; height: 10vh;"></div>
        </div>
    </body>
    
</html>