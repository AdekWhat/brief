<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 22.05.2018
 * Time: 11:50
 */

namespace core;


class Filter
{


    public static function filter(array $arr)
    {
        foreach ($arr as $value)
        {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $value = strtolower($value);
            return $value;





        }


    }


}