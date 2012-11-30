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
        $this->Username = Session::get_user();
    }
    // mutator
    
    public function update(){
       // $sql = "UPDATE users  SET Surname='".$Surname."',First_Name='".$First_Name."',Middle_Name='". $Middle_Name ."',Password='".$Password."' WHERE Username='".$Username."'";

        $sql = "UPDATE users SET Surname='".$this->Surname."', First_Name='".$this->First_Name."', Middle_Name='".$this->Middle_Name."',Password='".$this->Password."' Where Username='".$this->Username."'";
        $message = "";
        if(mysql_query($sql)){
            $message = "Success";
            
        }else{
            $message = "failed";
        }
        echo $this->Middle_Name;
        echo $message;
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
    public function getPass(){
        
    }
}
?>
