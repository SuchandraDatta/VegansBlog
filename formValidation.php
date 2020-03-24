<?php 
  $flag=0;
  if(isset($_REQUEST["submit"])){
      echo "INSIDE THIS PLACE";
      $title=$_REQUEST["title"];
      if(strlen($title)>255)
      { $title_error="Title must be within 255 characters<br/>";$flag=1;}
      else
      $title_error="Valid title";

      $shortDesc=$_REQUEST["shortDescription"];
      if(strlen($shortDesc)>255)
      { $shortDescription_error="Short desc must be within 255 characters<br/>";$flag=1;}
      else
      $shortDescription_error="Valid shortDesc";

      $ingredients=$_REQUEST["ingredients"];
      if(strlen($ingredients)>255)
      { $ingredients_error="<255 needed<br/>";$flag=1;}
      else
      $ingredients_error="Valid ingre<br/>";

      $longDescription=$_REQUEST["longDescription"];
      if(strlen($longDescription)>255)
      { $longDescription_error="<255 needed<br/>"; $flag=1;}
      else
      $longDescription_error="Valid longDescription<br/>";
  }
?>