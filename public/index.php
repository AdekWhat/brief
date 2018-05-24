<?php
const PUBLIC_URL = '/';

require_once(__DIR__ . '/../bootstrap.php');

try {
    session_start();
    $router = new \core\Router();



        call_user_func_array(
            [$router->getController(), $router->getAction()],
            $router->getData()
        );



} catch (\Exception $e) {
}




