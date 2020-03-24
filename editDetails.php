<?php
        $title_error="";
        $shortDescription_error="";
        $longDescription_error="";
        $ingredients_error="";
        echo "OVER HERE";
        $title="";
        echo "HERE IN EDIT DETAILS";
        if(isset($_REQUEST["submit"]))
        {
            include("./formValidation.php");
            if($flag==0)
                {
                    $con=mysqli_connect("localhost", "shaun", "test", "VegansBlog");
                    if($con)
                    {
                        echo "CONNECTED";
                    }
                    else
                    {
                        echo "NOT CONNECTED";
                    }
            $title=mysqli_real_escape_string($con, $_REQUEST["title"]);
            $shortDescription=mysqli_real_escape_string($con, $_REQUEST["shortDescription"]);
            $longDescription=mysqli_real_escape_string($con, $_REQUEST["longDescription"]);
            $ingredients=mysqli_real_escape_string($con, $_REQUEST["ingredients"]);
            $id=mysqli_real_escape_string($con, $_REQUEST["id"]);
            $sql="UPDATE recipes SET title='$title', shortDescription='$shortDescription', longDescription='$longDescription', ingredients='$ingredients' WHERE id=$id";
            mysqli_query($con, $sql);
            echo $id;
            if (mysqli_query($con, $sql)) {
                echo "Record updated successfully";
                header('Location: viewRecipes.php');
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
            
                }
        }
        else
        echo "Submit button not set";
        ?>