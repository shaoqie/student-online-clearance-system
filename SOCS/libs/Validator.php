<?php

/*
 * Validator
 * Input Validating Class
 */

class Validator {

    public static function is_valid_password($password) {
        if (isset($password[6]) && strlen($password) <= 50) {
            return true;
        }
        return false;
    }

    public static function compare_password($password, $repeat) {
        if ($password && $repeat) {
            if ($password === $repeat) {
                return true;
            }
        }
        return false;
    }
    
    public static function is_valid_username($username) {
        /** don't allow characters / \ ? < > : ; " * and numerical characters on store name */
        return preg_match('/[\s\?\:\>\<\"\\\*\/\;]/', $username) ? false : true;
    }

    public static function is_valid_name($storename) {
        /** don't allow characters / \ ? < > : ; " * and numerical characters on store name */
        return preg_match('/[0-9\?\:\>\<\"\\\*\/\;]/', $storename) ? false : true;
    }

    public static function is_valid_photo($imagefile) {

        $types = array("image/jpeg", "image/png", "image/gif", "image/pjpeg");

        $test = 0;
        
        if (in_array($imagefile["type"], $types)) {
            $test++;
        }

        if ($imagefile["size"] < 1048576) { // 1 MB == 1,048,576 bytes
            $test++;
        }
        
        if($imagefile["error"] == 0){
            $test++;
        }

        if($test == 3){
            return true;
        }else{
            return false;
        }
    }
    
    public static function is_valid_signature_image($imagefile) {

        $types = array("image/jpeg", "image/png", "image/gif", "image/pjpeg");

        $test = 0;
        
        //var_dump($imagefile["type"]);
        
        if (in_array($imagefile["type"], $types)) {
            $test++;
            //echo "pass1 </br>";
        }

        if ($imagefile["size"] < 1048576) {
            $test++;
            //echo "pass2 </br>";
        }
        
        if($imagefile["error"] == 0){
            $test++;
            //echo "pass3 </br>";
        }
        
        list($width, $height) = getimagesize($imagefile["tmp_name"]);
        if($width==200 && $height ==50){
            $test++;
            //echo "pass4 </br>";
        }

        if($test == 4){
            return true;
        }else{
            return false;
        }
    }

    public static function is_email_valid($email){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }    
    } 
}