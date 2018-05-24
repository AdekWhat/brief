<?php
namespace core;

class Config
{
    private static $instance;

    private $data = [];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function set(string $key, $value): array
    {
        $this->data[$key] = $value;
        return $this->data;
    }

    public function init(array $data)
    {
        $this->data = $data;
    }

    public function get(string $key)
    {

        return $this->data[$key] ?? null;
    }

}