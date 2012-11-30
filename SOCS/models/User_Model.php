<?php

/**
 * Administrator Model
 *
 * @author ronversa09, Ozy
 */

class User_Model extends Model{
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
    
    public function getUser($tempUser, $tempPass){
    
        return mysql_query("SELECT * FROM users WHERE username='$tempUser'and password='$tempPass' ");
        
       
        
    }     
    
    public function isExist($tempUser, $tempPass){
        
        $this->query = mysql_query("SELECT * FROM users WHERE username='$tempUser'and password='$tempPass' ");// where username = '$tempUser' and password = '$tempPass'");
        
        $rows = mysql_num_rows($this->query);
        
        
        //echo $this->getAccount_Type($tempUser, $tempPass) . ", " .$rows;
        
        if($rows==1){
            return true;
        }else{
            //echo $tempPass;
            return false;
        }
    }
    public function getAccount_Type($tempUser, $tempPass){
       $this->query = mysql_query("SELECT Account_Type FROM users WHERE username='$tempUser'and password='$tempPass' ");
        
        $sample = mysql_fetch_array($this->query);
        
        return $sample['Account_Type'];
        
    }
    
    
}

?>
