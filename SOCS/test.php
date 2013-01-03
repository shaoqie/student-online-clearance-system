<?php

require "config/config.php";

if (isset($_FILES["file"])) {
    
    $ext = array("jpg", "jpeg", "png", "gif");
    $types = array("image/jpeg", "image/png", "image/gif", "image/pjpeg");
    $filename = explode(".", $_FILES["file"]["name"]);
    $type = $_FILES["file"]["type"];
    
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else if(in_array(strtolower(end($filename)), $ext) && in_array($type, $types)){
        move_uploaded_file($_FILES["file"]["tmp_name"], PATH . "/photos/asdfsf.".end($filename));
        echo "stored";
    }
}
?> 

<form method="post" action="test.php" enctype="multipart/form-data">

    <input type="file" name="file">
    <input type="submit" value="Upload">

</form>