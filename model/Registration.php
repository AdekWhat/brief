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

    public function register($nickname,$password)
    {

        $db = new Connection();
        $qr = $db->someMethod("SELECT * FROM users WHERE username='$nickname'" );
        $qr = $qr->fetch_assoc();


        if ($qr["username"] === null || $qr ["username"] == ''){
            $password = md5($password);

            return $db->someMethod("INSERT INTO users ( username, password ) VALUES ('$nickname','$password')");

        }else{

            print_r("This nickname has been already taken");
        }

    }

}