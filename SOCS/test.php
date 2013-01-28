<!DOCTYPE html>   
<html lang="en">   
    <head>   
        <meta charset="utf-8">   
        <title>Twitter Bootstrap Modals Example</title>   
        <meta name="description" content="Creating Modal Window with Twitter Bootstrap">  
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="public/js/vendor/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="public/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/js/vendor/bootbox.min.js"></script>
        <script type="text/javascript" src="public/js/main.js"></script>

        <style type="text/css">

            p:hover#hover{
                color: #0088cc;
                text-decoration: none;
                cursor: pointer;
            }

        </style>

    </head>  
    <body>

        <?php
//        require_once 'libs/smarty/Smarty.class.php';
//
//        $smarty = new Smarty();
//
//        $smarty->setTemplateDir("views/student_views");
//
//        $smarty->display("student_registration.tpl");
        ?>

        <?php
        require "config/config.php";

//        if (isset($_FILES["file"])) {
//
//            $ext = array("jpg", "jpeg", "png", "gif");
//            $types = array("image/jpeg", "image/png", "image/gif", "image/pjpeg");
//            $filename = explode(".", $_FILES["file"]["name"]);
//            $type = $_FILES["file"]["type"];
//
//            if ($_FILES["file"]["error"] > 0) {
//                echo "Error: " . $_FILES["file"]["error"] . "<br>";
//            } else if (in_array(strtolower(end($filename)), $ext) && in_array($type, $types)) {
//                move_uploaded_file($_FILES["file"]["tmp_name"], PATH . "/photos/asdfsf." . end($filename));
//                echo "stored";
//            }
//        }
        
        var_dump($_FILES["file"]);
        
        ?>

        <form method="post" action="test.php" enctype="multipart/form-data">

            <input type="file" name="file">
            <input type="submit" value="Upload">

        </form>
    </body>  
</html>