<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 22.05.2018
 * Time: 13:18
 */

namespace model;

use core\Connection;

class Registration
{

    public static function register($nickname, $password)
    {

        $db = new Connection();

        print_r($nickname);
            $password = md5($password);



            return $db->someMethod("INSERT INTO users ( username, password)
 VALUES ('$nickname','$password')");



    }

    public static function checkUser($nickname)
    {
        $db = new Connection();
        $query = $db->someMethod("SELECT * FROM users WHERE username='$nickname'");
        $query = $query->fetch_assoc();
        if ($query["username"] === null || $query ["username"] == '') {
            return true;
        }
        return false;
    }


}