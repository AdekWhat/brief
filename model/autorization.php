<?php
namespace model;
use core\Connection;
use core\Filter;
class autorization
{

    public static function validate($nickname,$password)
    {

        $arr = array ("$nickname","$password");
        Filter::filter($arr);
        $password = md5($password);
        $db = new Connection();
        $sr = $db->someMethod("SELECT * FROM users WHERE username='$nickname'AND password='$password'" );
        $sr = $sr->fetch_assoc();
        if ($sr){
            $_SESSION["username"] = $nickname;
            $_SESSION['userid'] = $sr['password'];

            return true;

    }


}
}

