<?php

/**
 * Administrator Model
 *
 * @author ronversa09, Ozy
 */

class Administrator_Model extends Model{
    public $Username;
    public $Password;
    
    public $Surname;
    public $First_Name;
    public $Middle_Name;
    public $Account_Type;
    public $Picture;
    public $Assigned_Signatory;
    
    private $query;
    
    public function __construct() {
        parent::__construct();
    }
    // mutator
    
    public function setUserAdmin(){
    
        return mysql_query("SELECT * from users");
        
       
        
    }     
    
    public function isExist($tempUser, $tempPass){
        
        $this->query = mysql_query("SELECT * FROM users WHERE username='$tempUser'and password='$tempPass' ");// where username = '$tempUser' and password = '$tempPass'");
        
        $rows = mysql_num_rows($this->query);
        
        if($rows==1){
            return true;
        }else{
            //echo $tempPass;
            return false;
        }
    }
    
    }

?>
