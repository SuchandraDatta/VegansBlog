<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php 
    
    echo "Name is ". $_REQUEST["fname"];
    echo "<br/> Gender ". $_REQUEST["gender"];
    echo "<br/> Check box value";
    if(isset($_REQUEST["check1"]))
    {
        echo $_REQUEST["check1"] . "<br/>";
    }
    if(isset($_REQUEST["check2"]))
    {
        echo $_REQUEST["check2"] . "<br/>";
    }if(isset($_REQUEST["check3"]))
    {
        echo $_REQUEST["check3"] . "<br/>";
    }
    echo "<br/>Textarea values<br/>";
    echo $_REQUEST["address"];
    foreach($_REQUEST["courses"] as $course)
    {
        echo $course."<br/>";
    }
    
    //connect to database
    $con=mysqli_connect('localhost', 'shaun', 'test', 'ninja_pizza');
    if($con)
    {
        echo "CONNECTED";
    }
    else
    {
        echo mysqli_connect_error();
    }

    $sql='SELECT * FROM pizzas';
    $result=mysqli_query($con, $sql);
    $pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);
    print_r($pizzas);

    $title=mysqli_real_escape_string($con, $_REQUEST["title"]);
    $ingredients=mysqli_real_escape_string($con, $_REQUEST["ingredients"]);
    $email=mysqli_real_escape_string($con, $_REQUEST["email"]);

    $sql="INSERT INTO pizzas(title, ingredients,email) VALUES('$title', '$ingredients','$email')";
    mysqli_query($con, $sql);

    //mysqli_free_result($result);
    //mysqli_close($con);
    ?>
    <h3><?php echo $title?></h3>
    <ul>
        <?php foreach(explode(',', $ingredients) as $ing){?>
            <li><?php echo $ing?></li>
        <?php }?>
    </ul>
    <p><?php echo $email?></p>
</body>
</html>