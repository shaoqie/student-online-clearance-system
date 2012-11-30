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
       //$this->setUserAdmin();      
    }
    // mutator
    
    public function setUserAdmin(){
    
        return mysql_query("SELECT * from users");
        
       
        
    }     
    
    public function isExist($tempUser, $tempPass){
        
        $this->query = mysql_query("SELECT Username, Password from users where = '$tempUser' ");       
        $row = mysql_fetch_array($this->query);
          
            $this->Username = $row['Username'];      
            $this->Password = $row['Password'];  
  
        if($this->Username == $tempUser && $this->Password == $tempPass){
                    return true;
        }else{
                    return false;
        }
    }
    
    }

?>
