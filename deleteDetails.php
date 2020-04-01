<head>
    <style>
        body
        {
            background-image: url('./deleteDetails.jpg');
            font-size: 5em;
        }
    </style>
</head>
<body>
        <?php   
            $this_id=$_REQUEST["id"];
            $errorMessage="";
            //echo $this_id;
            $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
            /*if($con) 
            echo "CONNECTED";
            else
            echo "NOT CONNECTED";*/
            $sql="SELECT * FROM recipes WHERE id=$this_id";
            $result=mysqli_query($con, $sql);
            $this_recipe=mysqli_fetch_all($result, MYSQLI_ASSOC);
            //print_r($this_recipe);

            if($this_recipe[0]["userName522"] != $_COOKIE["userName"])
            {
                $errorMessage="You don't have that permission";
            }
            else
            {
                $sql="DELETE FROM recipes WHERE id=$this_id";
                mysqli_query($con, $sql);
            }
            
        ?>
        <p style="color: red; text-align: center; position: relative; top: 30vh;"><?php echo $errorMessage?></p>
</body>