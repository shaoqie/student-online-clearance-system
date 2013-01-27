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

        <p id="hover">sadfsadfsdf</p>

        <script type='text/javascript'>
            
            var a = '<div class="alert-success"><strong>$pre_msg</strong>$msg</div>';
            
            bootbox.alert(a);
        </script>

        <?php
        require_once 'libs/smarty/Smarty.class.php';

        $smarty = new Smarty();

        $smarty->setTemplateDir("views/student_views");

        $smarty->display("student_registration.tpl");
        ?>



        <!--
        <?php
        require "config/config.php";

        if (isset($_FILES["file"])) {

            $ext = array("jpg", "jpeg", "png", "gif");
            $types = array("image/jpeg", "image/png", "image/gif", "image/pjpeg");
            $filename = explode(".", $_FILES["file"]["name"]);
            $type = $_FILES["file"]["type"];

            if ($_FILES["file"]["error"] > 0) {
                echo "Error: " . $_FILES["file"]["error"] . "<br>";
            } else if (in_array(strtolower(end($filename)), $ext) && in_array($type, $types)) {
                move_uploaded_file($_FILES["file"]["tmp_name"], PATH . "/photos/asdfsf." . end($filename));
                echo "stored";
            }
        }
        ?> 
        
                <form method="post" action="test.php" enctype="multipart/form-data">
        
                    <input type="file" name="file">
                    <input type="submit" value="Upload">
        
                </form>
        
                <div class="container">  
                    <h2>Example of creating Modals with Twitter Bootstrap</h2>  
                    <div id="example" class="modal hide fade in" style="display: none; ">  
                        <div class="modal-header">  
                            <a class="close" data-dismiss="modal">×</a>  
                            <h3>This is a Modal Heading</h3>  
                        </div>  
                        <div class="modal-body">  
                            <h4>Text in a modal</h4>  
                            <p>You can add some text here.</p>                
                        </div>  
                        <div class="modal-footer">  
                            <a href="#" class="btn btn-success">Call to action</a>  
                            <a href="#" class="btn" data-dismiss="modal">Close</a>  
                        </div>  
                    </div>  
                    <p><a data-toggle="modal" href="#example" class="btn btn-primary btn-large">Launch demo modal</a></p>  
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
                    <script src="/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-modal.js"></script>-->
    </body>  
</html>