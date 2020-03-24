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