<?php

/**
 * Extend this Model class in every models
 *
 * @author Ozy
 */

abstract class Model {

    private $connectdb;
    public function __construct() {
        //connect database
        
        $this->connectdb = mysql_connect(SERVER, USERNAME, PASSWORD);
        
        if (!$this->connectdb){
            
        die('Could not connect: ' . mysql_error());
        }
        
        mysql_select_db(DATABASE, $this->connectdb);
        
    }
    
    public function db_close(){
        
        mysql_close($this->connectdb);
    }
}

?>
