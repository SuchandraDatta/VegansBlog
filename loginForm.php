<?php
    $message="";
    if(isset($_REQUEST["submit"]))
    {
        $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
    if($con) echo "Connected";
    else echo "Not connected";

    $username=mysqli_real_escape_string($con, $_REQUEST["userName"]);
    $sql="SELECT * FROM userAccounts WHERE userName='$username'";
    if(mysqli_query($con, $sql))
    {
        $message="CONGRATS";
        echo "CONNECTED";
    }
    else
    {
        echo mysqli_error($con);
    }
    }
    
?>
<body>
    <form action="loginForm.php">
        <input type="text" name="userName">
        <input type="password" name="passWord">
        <input type="submit" value="submit" name="submit">
    </form>
    <h1><?php echo $message?></h1>
</body>