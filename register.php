<?php
    $passError="";
    $passStrengthError="";
    if(isset($_REQUEST["submit"]))
    {
        if($_REQUEST["passWord1"]!=$_REQUEST["passWord2"])
        $passError="Passwords dont match";
        else
        {   $flag=0;
            echo $flag;
            for($i=0;$i<strlen($_REQUEST["passWord1"]);$i++)
            {
                $ch=strtolower(substr($_REQUEST["passWord1"],$i,1));
                echo $ch."<br/>";
                if($ch>='0'&&$ch<='9'||($ch<'a'&&$ch>'z'))
                {
                    $flag=1;
                    echo "0-9,a-z present";
                }
            }
            if($flag==0)
            $passStrengthError="Weak password";
            else
            {
                $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
                if($con) echo "Connected";
                else echo "Not connected";

                $userName=mysqli_real_escape_string($con, $_REQUEST["userName"]);
                $passWord522=mysqli_real_escape_string($con, $_REQUEST["passWord1"]);

                $sql="INSERT INTO userAccounts(userName, passWord522) VALUES('$userName', '$passWord522')";
                if(mysqli_query($con, $sql))
                {
                    echo "Query done successfully";
                }
                else
                {
                    echo mysqli_error($con);
                }
            }
        }
    }
?>
<body>
    <form action="./loginForm.php">
        <input type="text" name="userName" value="" placeholder="Username">
        <input type="password" name="passWord1" value="" placeholder="Password">
        <input type="password" name="passWord2" value="" placeholder="Reenter password">
        <h1><?php echo $passError?></h1>
        <h1><?php echo $passStrengthError?></h1>
        <input type="submit" value="submit" name="submit">
    </form>
</body>