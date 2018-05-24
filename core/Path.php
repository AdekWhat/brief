<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 22.05.2018
 * Time: 21:53
 */

namespace core;


class Path
{
    private static $urlPath;

    public static function setUrlPath($requirePath)
    {
        self::$urlPath = $requirePath;

    }

    public static function getUrlPath()
    {
        return self::$urlPath;
    }


    public static function createPath($dir)
    {
        $dir = __DIR__ . "/../templates/user/$dir";
        mkdir($dir);
        $write = '<?php
        $path = (__FILE__) ;
        $path =  explode("\\\",$path);
        $path = $path[7];
        require_once __DIR__."/../../../GetDataBase.phtml";
        require_once __DIR__."/../../../content.phtml" ;

        ?>';
        $dir = $dir . DIRECTORY_SEPARATOR . "index.phtml";

        $dir =  fopen("$dir", "x");
        fwrite($dir,$write);
        fclose($dir);


    }
}