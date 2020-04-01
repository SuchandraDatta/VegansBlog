<?php
    $passError="";
    $passStrengthError="";
    $unique="";
    if(isset($_REQUEST["submit"]))
    {
        if($_REQUEST["passWord1"]!=$_REQUEST["passWord2"])
        $passError="Passwords dont match";
        else
        {   $flag=0;
            //echo $flag;
            for($i=0;$i<strlen($_REQUEST["passWord1"]);$i++)
            {
                $ch=strtolower(substr($_REQUEST["passWord1"],$i,1));
                //echo $ch."<br/>";
                if($ch>='0'&&$ch<='9'||($ch<'a'&&$ch>'z'))
                {
                    $flag=1;
                    //echo "0-9,or special character present";
                }
            }
            if($flag==0)
            $passStrengthError="Weak password given";
            else
            {
                $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
                /*if($con) echo "Connected";
                else echo "Not connected";*/

                $userName=mysqli_real_escape_string($con, $_REQUEST["userName"]);
                $passWord522=mysqli_real_escape_string($con, $_REQUEST["passWord1"]);
                
                $flag=0;
                $dummySQL="SELECT * FROM userAccounts WHERE userName='$userName'";
                $result=mysqli_query($con, $dummySQL);
                $ar=mysqli_fetch_all($result, MYSQLI_ASSOC);
                //print_r($ar);
                if(count($ar)!=0)
                {
                       $unique="Username already taken";
                       //echo "IN HERE";
                       
                }
                else
                {
                    $x=password_hash($passWord522, PASSWORD_DEFAULT );
                    $x=mysqli_real_escape_string($con, $x);

                    $sql="INSERT INTO userAccounts(userName, passWord522) VALUES('$userName', '$x')";
                    if(mysqli_query($con, $sql))
                    {
                    echo "Query done successfully";
                    header('Location: ./indexVegansBlog.php');
                    }
                    else
                    {
                    echo mysqli_error($con);
                    }
                }
                
            }
        }
    }
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>       
        <style>
        body
        {
            background-image: url('registerBackpic.jpg');
            background-size: cover;
            color: white;
        }
            .registerForm
            {
                height: 80vh;
                width: 50vw;
                position: relative;
                margin-left: 25vw;
                margin-top: 10vh;
            }
            input
            {
                border: none;
                position: relative;
                margin-top:10vh;
                margin-left: 14vw;
                height: 3em;
                width: 20vw;
                border-radius: 2em;
                text-align: center;
                box-shadow: 0 0 20px 1px rgba(255,255,255,0.8);
            }
            input:focus
            {
                background-color: rgba(0,0,0,0.9);
                color: white;
                box-shadow: 0 0 20px 1px rgba(0,0,0,0.9);
            }
            @media screen and (max-width: 414px)
            {
                .registerForm
                {
                    height: 80vh;
                    width: 80vw;
                    position: relative;
                    margin-top: 10vh;
                    margin-left:10vw;
                     
                }
                input
                {
                    margin-top:10vh;
                    margin-left: 15vw;
                    height: 3em;
                    width: 50vw;
                    border-radius: 2em;
                    text-align: center;
                    box-shadow: 0 0 20px 1px rgba(255,255,255,0.8);
                }
            }
        </style>
</head>
<body>
<div class="registerForm">
    <form action="./register.php" action="POST">
        <input type="text" name="userName" value="" placeholder="Username" required><br/>
        <h6 style="color: red; text-align: center; position: relative; top: 2vh;"><?php echo $unique?></h6> 
        <input type="password" name="passWord1" value="" placeholder="Password" maxlength="14" required><br/>
        <h6 style="color: red; text-align: center; position: relative; top: 2vh;"><?php echo $passStrengthError?></h6>
        <input type="password" name="passWord2" value="" placeholder="Reenter password" maxlength="14" required><br/>
        <h6 style="color: red; text-align: center;"><?php echo $passError?></h6>
        <input type="submit" value="submit" name="submit"><br/>
    </form>
</div>
</body>