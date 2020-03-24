<!DOCTYPE html>
<html>
<head>
<body>
<?php 
            $title=$_REQUEST["title"];
            if(strlen($title)>255)
            echo "Title must be within 255 characters<br/>";
            else
            echo "Valid title<br/>";

            $shortDesc=$_REQUEST["shortDescription"];
            if(strlen($shortDesc)>255)
            echo "Short desc must be within 255 characters<br/>";
            else
            echo "Valid shortDesc";

            $ingredients=$_REQUEST["ingredients"];
            if(strlen($ingredients)>255)
            echo "<255 needed<br/>";
            else
            echo "Valid ingre<br/>";

            $longDescription=$_REQUEST["longDescription"];
            if(strlen($longDescription)>255)
            echo "<255 needed<br/>";
            else
            echo "Valid longDescription<br/>"       
        ?>
</body>
</html>