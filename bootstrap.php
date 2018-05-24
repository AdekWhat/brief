<?php
use core\Config;
const PUBLIC_URL = '/';

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

try {
    $config = include(__DIR__ . '\config.php');
    Config::getInstance()->init($config);

    $pageUri = Config::getInstance()->get('base_url');
} catch (\Exception $e) {
}
