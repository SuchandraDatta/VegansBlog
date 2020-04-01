<!DOCTYPE html>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body
            {
                font-size: 1.5em;
                background-image: url('./viewDetailsBackpic.jpg');
                background-size: cover;
                
            }
            ul
            {
                list-style-type: none;
                margin-top: 40vh;
            }
            .box
            {
                position: relative;
                top: 30vh;
                text-align:center;
            }
            .anotherBox
            {
                position: relative;
                margin-left: 40vw;
                
            }
            h3, h4
            {
                position: relative;
                margin: 10vh;
            }
            @media screen and (max-width: 414px)
            {
                .anotherBox
                {
                    margin-left: 10vh;
                }
            }
        </style>
        </head>
        <body>

            <?php 
                $this_id=$_REQUEST["id"];
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
            ?>
            <div class="box">
                <h1><?php echo $this_recipe[0]['title']?></h1>
                <h3><?php echo $this_recipe[0]["shortDescription"]?></h3>
                <h4><?php echo $this_recipe[0]["longDescription"]?></h4>
            </div>
            <div class="anotherBox">
            <ul>
                <?php foreach(explode(',', $this_recipe[0]["ingredients"]) as $ing) { ?>
                    <li><?php echo $ing?></li>
                <?php }?>
            </ul>
            </div>
        </body>
</html>