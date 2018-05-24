<?php

class Autoload
{

    /**
     * @param string $className
     * @return bool
     */

        public static function loader($className)
    {


        $fileName = __DIR__;

        $chains = explode('\\', $className);
        $file = array_pop($chains);

        foreach ($chains as $chain) {

            $fileName .= DIRECTORY_SEPARATOR . strtolower($chain);
        }
        $fileName .= DIRECTORY_SEPARATOR . $file . '.php';

        if (file_exists($fileName)) {
            require_once ($fileName);
            if (class_exists($className) || interface_exists($className)) {

                return true;

            }

        }
        }
}