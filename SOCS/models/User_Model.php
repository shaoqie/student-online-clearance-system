<?php

/**
 * Administrator Model
 *
 * @author ronversa09, Ozy
 */
class User_Model extends Model {

    public $Username;
    public $Password;
    public $Surname;
    public $First_Name;
    public $Middle_Name;
    public $Account_Type;
    public $Picture;
    public $Assigned_Signatory;
    private $query;
    private $itemsPerPage = 10;

    public function __construct() {
        parent::__construct();
        @$this->Username = Session::get_user();
    }

    // mutator

    public function getUser($tempUser, $tempPass) {

        return mysql_query("SELECT * FROM users WHERE username='$tempUser'and password='$tempPass' ");
    }

    public function isExist($tempUser, $tempPass) {

        $this->query = mysql_query("SELECT * FROM users WHERE username='$tempUser'and password='$tempPass' "); // where username = '$tempUser' and password = '$tempPass'");

        $rows = mysql_num_rows($this->query);


        //echo $this->getAccount_Type($tempUser, $tempPass) . ", " .$rows;

        if ($rows == 1) {
            return true;
        } else {
            //echo $tempPass;
            return false;
        }
    }

    public function getAccount_Type($tempUser, $tempPass) {
        $this->query = mysql_query("SELECT Account_Type FROM users WHERE username='$tempUser'and password='$tempPass' ");

        $sample = mysql_fetch_array($this->query);

        return $sample['Account_Type'];
    }

    public function update($account) {
        if ($account == "Admin" || $account == "Signatory") {
            $sql = "UPDATE users SET Surname='" . $this->Surname . "', First_Name='" . $this->First_Name . "', Middle_Name='" . $this->Middle_Name . "',Password='" . $this->Password . "' Where Username='" . $this->Username . "'";
        } else if ($account == "Student") {
            $sql = "UPDATE users SET password='" . $this->Password . "' Where username ='" . $this->Username . "'";
        }

        if (mysql_query($sql)) {
            Session::set_password($this->Password);
            Session::set_firstname($this->First_Name);
            Session::set_middlename($this->Middle_Name);
            Session::set_surname($this->Surname);
            return true;
        }else{
            return false;
        }
    }

    public function getListofUsers($searchName, $page) {

        $query = mysql_query("select Username, Picture, concat(Surname, ', ', First_Name, ' ', Middle_Name) 
                        as Name, Account_Type from users 
                        where First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
                        Middle_Name like '%$searchName%' LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        return $query;
    }

    public function getQueryPageSize($searchName) {
        $query = mysql_query("select Picture, concat(Surname, ', ', First_Name, ' ', Middle_Name) 
                        as Name, Account_Type from users 
                        where First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
                        Middle_Name like '%$searchName%'");
        return mysql_num_rows($query) / $this->itemsPerPage;
    }

    public function deleteUser($key) {
        mysql_query("delete from users where Username = '$key'");
    }

}

?>
