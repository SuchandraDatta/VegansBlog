<!DOCTYPE html>
<html>
        <head></head>
        <body>

            <?php 
                $this_id=$_REQUEST["id"];
                echo $this_id;
                $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
                if($con) 
                echo "CONNECTED";
                else
                echo "NOT CONNECTED";
                $sql="SELECT * FROM recipes WHERE id=$this_id";
                $result=mysqli_query($con, $sql);
                $this_recipe=mysqli_fetch_all($result, MYSQLI_ASSOC);
                print_r($this_recipe);
            ?>
            <h1><?php echo $this_recipe[0]['title']?></h1>
            <h3><?php echo $this_recipe[0]["shortDescription"]?></h3>
            <h4><?php echo $this_recipe[0]["longDescription"]?></h4>
            <ul>
                <?php foreach(explode(',', $this_recipe[0]["ingredients"]) as $ing) { ?>
                    <li><?php echo $ing?></li>
                <?php }?>
            </ul>
        </body>
</html>