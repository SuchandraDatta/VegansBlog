<?php
    $message="";
    if(isset($_REQUEST["submit"]))
    {
        $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
    if($con) echo "Connected";
    else echo "Not connected";

    $username=mysqli_real_escape_string($con, $_REQUEST["userName"]);
    $passWord=mysqli_real_escape_string($con, $_REQUEST["passWord522"]);
     
    $sql="SELECT * FROM userAccounts WHERE userName='$username'";
    $result=mysqli_query($con, $sql);
    $x=mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($x);
        echo "HASH=".$x[0]["passWord522"]."<br/>";
        echo "<br/>PASSWORD=".$passWord;
    if(count($x)==1 && password_verify($passWord, $x[0]["passWord522"]))
    {
        $message="CONGRATS";
        echo "CONNECTED";
        setcookie('userName', $username);
        header('Location:index.php');
    }
    else
    {
        echo mysqli_error($con);
    }
    }
    
?>
<body>
    <form action="loginForm.php" action="POST">
        <input type="text" name="userName">
        <input type="password" name="passWord522">
        <input type="submit" value="submit" name="submit">
    </form>
    <h1><?php echo $message?></h1>
</body>