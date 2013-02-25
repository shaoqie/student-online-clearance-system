<?php

/*
 * -----------------------------------------------------------------------------
 * CONSTANTS
 * -----------------------------------------------------------------------------
 */

// socs global settings (for localhost)
define('SERVER', 'localhost');                      //server
define('USERNAME', 'root');                 // username
define('PASSWORD', '');                 // password
define('DATABASE', 'socs');                  // database name
define('PATH', "C:/wamp/www/SOCS/");      //project root
define('HOST', "http://localhost/SOCS");              //host url


// socs global settings (for hosting)
/*
define('SERVER', 'localhost');                      //server
define('USERNAME', 'socsx10m_usr');                 // username
define('PASSWORD', 'U$2fs?MX]41V');                 // password
define('DATABASE', 'socsx10m_db');                  // database name
define('PATH', "/home/socsx10m/public_html/");      //project root
define('HOST', "http://socs.x10.mx");              //host url
*/


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
