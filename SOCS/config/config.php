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
define('PATH', $_SERVER['DOCUMENT_ROOT']."SOCS/");

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
