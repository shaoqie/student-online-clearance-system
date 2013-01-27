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
    
    
    private $filter_ID;
    private $filter_Name;
    private $filter_Picture;
    private $filter_Type;
    

    public function __construct() {
        parent::__construct();
        @$this->Username = Session::get_user();
    }

    public function insert($uname, $pass, $sname, $fname, $mname, $pic, $user_type, $assign_sign){
        $this->query = mysql_query("INSERT INTO `socs`.`users` (`Username`, `Password`, `Surname`, `First_Name`, `Middle_Name`, `Account_Type`) 
                        VALUES 
                        ('$uname', '$pass', '$sname', '$fname', '$mname', '$user_type')");
        
        echo "Error user: " .mysql_error();
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
    
    public function getFilter_ID(){
        return $this->filter_ID;
    }
    
    public function getFilter_Name(){
        return $this->filter_Name;
    }
    
    public function getFilter_Picture(){
        return $this->filter_Picture;
    }
    
    public function getFilter_Type(){
        return $this->filter_Type;
    }
    
    /*-----------------------------------------------*/
    
    public function filter($t_searchName ,$t_page, $t_type){
        $this->query = mysql_query("select Username, Picture, concat(Surname, ', ', First_Name, ' ', Middle_Name) 
                        as Name, Account_Type from users 
                        where (First_name like '%$t_searchName%' OR Surname like '%$t_searchName%' OR 
                        Middle_Name like '%$t_searchName%') AND Account_Type = '$t_type' order by Name
                        LIMIT " . (($t_page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        $this->filter_ID = array();
        $this->filter_Name = array();
        $this->filter_Picture = array();
        $this->filter_Type = array();
        while($row = mysql_fetch_array($this->query)){
            array_push($this->filter_ID, $row['0']);
            array_push($this->filter_Name, $row['2']);
            array_push($this->filter_Picture, $row['1']);
            array_push($this->filter_Type, $row['3']);
        }
        
    }
    
    /*------------------------------*/

//    public function getListofUsers($searchName, $page, $type) {
//
//        $query = mysql_query("select Username, Picture, concat(Surname, ', ', First_Name, ' ', Middle_Name) 
//                        as Name, Account_Type from users 
//                        where (First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
//                        Middle_Name like '%$searchName%') AND Account_Type = '$type' order by Name
//                        LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
//        return $query;
//    }
    
    /*------------------------------*/

    public function getQueryPageSize($searchName, $type) {
        $query = mysql_query("select Picture, concat(Surname, ', ', First_Name, ' ', Middle_Name) 
                        as Name, Account_Type from users 
                        where (First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
                        Middle_Name like '%$searchName%') AND Account_Type = '$type'");
        return mysql_num_rows($query) / $this->itemsPerPage;
    }

    public function deleteUser($key) {  
        mysql_query("delete from users where Username = '$key'");   
    }
    
    
    /*--------- For Assigning Signatory ----------*/
    
    public function getListofSignatory(){
        $rowInfo = array();
        $this->query = mysql_query("select signatory_name from signatories");
        
        while($row = mysql_fetch_array($this->query)){
            array_push($rowInfo, $row['signatory_name']);
        }
        
        return $rowInfo;
    } 
    
    public function getAssignSignatory($uname){
        $this->query = mysql_query("select Signatory_Name from users
                                    inner join signatories
                                    on users.Assigned_Signatory = signatories.Signatory_ID
                                    where username = '$uname'");
        $row = mysql_fetch_array($this->query);
        
        return $row['Signatory_Name'];
    }    
    
    /*---------------------------------------------------------------------------------------*/
    /*------------ For Signatory Dashboard Part ----------------*/
    
    public function filterStudent($Tsign_id, $searchName, $page){
        $this->query = mysql_query("select students.username, concat(Surname, ', ', First_Name, ' ', Middle_Name) as Name from students
                                    inner join users on students.username = users.username
                                    inner join clearancestatus on users.username = clearancestatus.student
                                    inner join courses on students.course_id = courses.course_id
                                    inner join departments on courses.Department_ID = departments.Department_ID
                                    inner join signatorialList on departments.Department_ID = signatorialList.department_id
                                    inner join signatories on signatorialList.signatory_id = signatories.signatory_id
                                    where (First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
                                    Middle_Name like '%$searchName%') AND Account_Type = 'student' 
                                    AND signatories.signatory_id = '$Tsign_id' group by Name order by Name
                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
        
        
        $this->filter_ID = array();
        $this->filter_Name = array();
        while($row = mysql_fetch_array($this->query)){
            array_push($this->filter_ID, $row['0']);
            array_push($this->filter_Name, $row['1']);
        }
    }
    
    // List of student users.
//    public function filter_ListofStudent_Username($Tsign_id, $searchName, $page){
//        $filter = array();
//        $this->query = mysql_query("select students.username, concat(Surname, ', ', First_Name, ' ', Middle_Name) as Name from students
//                                    inner join users on students.username = users.username
//                                    inner join clearancestatus on users.username = clearancestatus.student
//                                    inner join courses on students.course_id = courses.course_id
//                                    inner join departments on courses.Department_ID = departments.Department_ID
//                                    inner join signatorialList on departments.Department_ID = signatorialList.department_id
//                                    inner join signatories on signatorialList.signatory_id = signatories.signatory_id
//                                    where (First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
//                                    Middle_Name like '%$searchName%') AND Account_Type = 'student' 
//                                    AND signatories.signatory_id = '$Tsign_id' group by Name order by Name
//                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
//        
//        while($row = mysql_fetch_array($this->query)){
//            array_push($filter, $row['0']);
//        }
//        
//        return $filter;
//    }
//    
//    public function filter_ListofStudent_NameUsers($Tsign_id, $searchName, $page){
//        $filter = array();
//        $this->query = mysql_query("select concat(Surname, ', ', First_Name, ' ', Middle_Name) as Name from students
//                                    inner join users on students.username = users.username
//                                    inner join clearancestatus on users.username = clearancestatus.student
//                                    inner join courses on students.course_id = courses.course_id
//                                    inner join departments on courses.Department_ID = departments.Department_ID
//                                    inner join signatorialList on departments.Department_ID = signatorialList.department_id
//                                    inner join signatories on signatorialList.signatory_id = signatories.signatory_id
//                                    where (First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
//                                    Middle_Name like '%$searchName%') AND Account_Type = 'student' 
//                                    AND signatories.signatory_id = '$Tsign_id' group by Name order by Name
//                                    LIMIT " . (($page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage);
//        
//        while($row = mysql_fetch_array($this->query)){
//            array_push($filter, $row['Name']);
//        }
//        
//        return $filter;
//    }
    
    public function getStudent_PageSize($Tsign_id, $searchName){
        $this->query = mysql_query("select concat(Surname, ', ', First_Name, ' ', Middle_Name) as Name from students
                                    inner join users on students.username = users.username
                                    inner join clearancestatus on users.username = clearancestatus.student
                                    inner join courses on students.course_id = courses.course_id
                                    inner join departments on courses.Department_ID = departments.Department_ID
                                    inner join signatorialList on departments.Department_ID = signatorialList.department_id
                                    inner join signatories on signatorialList.signatory_id = signatories.signatory_id
                        where (First_name like '%$searchName%' OR Surname like '%$searchName%' OR 
                        Middle_Name like '%$searchName%') AND Account_Type = 'student'
                        AND signatories.signatory_id = '$Tsign_id' group by Name");
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    }
    
}

?>
