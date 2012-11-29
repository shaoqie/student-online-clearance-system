<?php

//Server
define('SERVER', 'localhost');

//Username
define('USERNAME', 'root');

//Password
define('PASSWORD', '');

//Database
define('DATABASE', '');

//Project Folder
define('PATH', $_SERVER['DOCUMENT_ROOT']."SOCS/");

require_once PATH.'config/config.php';

require_once PATH.'libs/Controller.php';
require_once PATH.'libs/Model.php';
require_once PATH.'models/Administrator_Model.php';
?>
