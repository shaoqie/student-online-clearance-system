<?php

/**
 * Extend this Controller class in every controllers
 *
 * @author Ozy
 */

abstract class Controller {

    public function __construct() {

    }
    
    public abstract function display();
}

?>
