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

        if ($imagefile["size"] < 1000000) {
            $test++;
        }

        if($test == 2){
            return true;
        }else{
            return false;
        }
    }

}