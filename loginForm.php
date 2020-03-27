<?php
    $message="";
    if(isset($_REQUEST["submit"]))
    {
        $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
    //if($con) echo "Connected";
   // else echo "Not connected";

    $username=mysqli_real_escape_string($con, $_REQUEST["userName"]);
    $passWord=mysqli_real_escape_string($con, $_REQUEST["passWord522"]);
     
    $sql="SELECT * FROM userAccounts WHERE userName='$username'";
    $result=mysqli_query($con, $sql);
    $x=mysqli_fetch_all($result, MYSQLI_ASSOC);
        //print_r($x);
        //echo "HASH=".$x[0]["passWord522"]."<br/>";
        //echo "<br/>PASSWORD=".$passWord;
    if(count($x)==1 && password_verify($passWord, $x[0]["passWord522"]))
    {
        $message="";
        echo "congrats";
        setcookie('userName', $username);
        header('Location:indexVegansBlog.php');
    }
    else
    {   $message="Incorrect username or password";
        //echo mysqli_error($con);
    }
    }
    
?>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>       
        <style>
            .formBackground
            {
                background-color: rgba(0,0,0,0.25);
                border-radius: 1em;
                height: 80vh;
                width: 40vw;
                margin-left: auto;
                margin-right: auto;
                position: relative;
                margin-top: 10vh;
                box-shadow: 0 0 20px 1px rgba(255,255,255,0.8);
            }
            form
            {
                position: relative;
                top: 10vh;
            }
            input
            {
                border: none;
                position: relative;
                margin-top: 10vh;
                margin-left: 20vh;
                width: 20vw; 
                height: 3em;
                border-radius: 2em;
                text-align: center;
            }
            input:focus
            {
               background-color: rgba(0, 0, 0, 0.7);;
               color: white;
               box-shadow: 0 0 20px 1px rgba(0,0,0,1);
            }
            body
            {
                background-image: url('loginBack.jpg');
                background-size: cover;
                color: white;
            }
            input[type=submit]
            {
                width: 10vw;
                position: relative;
                left: 5vw;
                box-shadow: 0 0 20px 1px rgba(255,255,255,0.8);
            }
            @media screen and (max-width: 414px)
            {
                .formBackground
                {  
                    width: 80vw;
                }
                input
                {
                    width: 50vw; 
                    height: 3em;
                    margin-left: 10vh;
                 }
                 input[type=submit]
                    {
                        width: 40vw;
                     }
            } 
        </style>
</head>
<body>
    <div class="formBackground">
    
    <form action="loginForm.php" action="POST">
        <input type="text" name="userName"  placeholder="Username" value="" required><br/>
        <input type="password" name="passWord522" placeholder="Password" value="" required><br/>
        <h6 style="color: red; text-align: center; position: relative; top: 2vh;"><?php echo $message?></h6>
        <input type="submit" value="submit" name="submit"><br/>
    </form>
    
    </div>
</body>