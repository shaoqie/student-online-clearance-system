<?php

/**
 * Extend this Controller class in every controller
 *
 * @author Ozy
 */

abstract class Controller {

    public function __construct() {
        Session::init();
    }
    
    public abstract function display();
}

?>
