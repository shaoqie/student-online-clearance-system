<!DOCTYPE html>   
<html lang="en">   
    <head>   
        <meta charset="utf-8">   
        <title>Twitter Bootstrap Modals Example</title>   
        <meta name="description" content="Creating Modal Window with Twitter Bootstrap">  
        <link href="http://localhost/SOCS/public/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://localhost/SOCS/public/js/vendor/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="http://localhost/SOCS/public/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/SOCS/public/js/vendor/bootbox.min.js"></script>
        <script type="text/javascript" src="http://localhost/SOCS/public/js/main.js"></script>

        <style type="text/css">

            p:hover#hover{
                color: #0088cc;
                text-decoration: none;
                cursor: pointer;
            }

        </style>

    </head>  
    <body>

        <ul class="nav nav-list accordion">
            <div class="accordion-group">

                <li class="accordion-heading"><a href="#">User Accounts</a>

                    <ul class="nav nav-list">
                        <li><a href='#'>Student</a></li>
                        <li><a href='#'>Confirmed Signatory</a></li>
                        <li><a href='#'>Unconfirmed Signatory</a></li>
                    </ul>

                </li>   

            </div>

            <li><a href='#'>Signatories</a></li>
            <li><a href='#'>Departments</a></li>
        </ul>

        <div class="accordion">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle">sdsdfsdfsdf</a>
                </div>
                <div class="accordion-body">
                    <div class="accordion-inner">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Collapsible Group Item #1
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>
        </div>
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