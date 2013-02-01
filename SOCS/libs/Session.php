<?php

/**
 * Session Class
 *
 * @author Ozy
 */
class Session {
    
    public static function init(){
        session_start();
    }
    
    public static function setSY_SEM_ID($sy_id1){
        $_SESSION['sy_id'] = $sy_id1;
    }
    
    public static function setSchoolYear($sy){
        $_SESSION['school_year'] = $sy;
    }
    
    public static function setSemester($sem){
        $_SESSION['semester'] = $sem;
    }
    
    //mutator
    public static function set_Account_type($Account_type){
        
        $_SESSION['Account_type'] = $Account_type;
    }
    
    public static function set_user($username,$password){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
    
    public static function set_password($password){
        $_SESSION['password'] = $password;
    }
    
    public static function set_surname($surname){
        $_SESSION['surname'] = $surname;
    }
    
    public static function set_firstname($firstname){
        $_SESSION['firstname'] = $firstname;
    }
    
    public static function set_middlename($middlename){
        $_SESSION['middlename'] = $middlename;
    }
    
    public static function set_emailAdd($email_add){
        $_SESSION['emailAdd'] = $email_add;
    }
    
    
    public static function set_assignSignatory($assignSign){
        $_SESSION['assignSignatory'] = $assignSign;
    }
    
    public static function set_deptpartName($deptName){
        $_SESSION['Department_Name'] = $deptName;
    }
    
    public static function set_photo($photo){
        $_SESSION['photo'] = $photo;
    }

    //acessor
    public static function getSY_SEM_ID(){
        return $_SESSION['sy_id'];
    }
    
    public static function getSchoolYear(){
        return $_SESSION['school_year'];
    }
    
    public static function getSemester(){
        return $_SESSION['semester'];
    }
    
    public static function get_user(){
        return $_SESSION['username'];
    }
    
    public static function get_Account_type(){
        
        return $_SESSION['Account_type'];
    }
    
    public static function get_Surname(){
        return $_SESSION['surname'];
    }
    
    public static function get_Firstname(){
        return $_SESSION['firstname'];
    }
    
    public static function get_Middlename(){
        return $_SESSION['middlename'];
    }
    
    public static function get_emailAdd(){
        return $_SESSION['emailAdd'];
    }
    
    public static function get_DepartmentName(){
        return $_SESSION['Department_Name'];
    }
    
    public static function get_AssignSignatory(){
        return $_SESSION['assignSignatory'];
    }
    
    public static function get_photo(){
        return $_SESSION['photo'];
    }

    public static function user_exist(){
        if(isset($_SESSION['username'])){
            return true;
        }else{
            return false;
        }
    }
    
    public static function destroy(){
        unset($_SESSION['username']);
        session_destroy();
    }
    
    public static function getUserPass(){
        return $_SESSION['password'];
    }
}

?>
