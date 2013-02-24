<?php

/*
 * -----------------------------------------------------------------------------
 * CONSTANTS
 * -----------------------------------------------------------------------------
 */

/*
 * Server
 */
define('SERVER', 'localhost');

/*
 * Username
 */
define('USERNAME', 'root');

/*
 * Password
 */
define('PASSWORD', '');

/*
 * Database
 */
define('DATABASE', 'socs');

/*
 * Project Root
 */
define('PATH', "C:/wamp/www/SOCS/");

/*
 * Host
 */
define('HOST', "http://localhost/SOCS");

/*
 * Default Photo
 */
define('DEFAULT_PHOTO', PATH . "photos/default.png");

/*
 * -----------------------------------------------------------------------------
 * AUTOLOADERS
 * -----------------------------------------------------------------------------
 */

/*
 * Load classes from libs folder when a class instantiated
 */
function autoload_libs($class){
    
    if (file_exists(PATH."libs/$class.php")) {
        require_once PATH."libs/$class.php";
    }
    
    if ($class == "FPDF"){
        require_once PATH."libs/fpdf/fpdf.php";
    }
    
    if($class == "upload"){
        require_once PATH."libs/class.upload/class.upload.php";
    }
    
    if($class == "Spreadsheet_Excel_Reader"){
        require_once PATH."libs/php-excel-reader-2.21/excel_reader2.php";
    }
}

/*
 * Load classes from models folder when a model class instantiated
 */
function autoload_models($class){
    
    if (file_exists(PATH."models/$class.php")) {
        require_once PATH."models/$class.php";
    }
}

/*
 * Register all autoload functions
 */
spl_autoload_register('autoload_libs');
spl_autoload_register('autoload_models');

?>
