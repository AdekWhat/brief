<?php
/**
 * Created by PhpStorm.
 * User: AdekWhat
 * Date: 20.05.2018
 * Time: 17:49
 */
namespace core;
class Connection
{
    public $link;
    private $connection = null;
    public  function __construct()
    {

        if ($this->connection === null) {
            $this->connection = new \mysqli("127.0.0.1", 'root', '', 'edtions');
            if (!$this->connection) {
           return false;
            }

        }
    return $this->connection;



    }

    public function someMethod($query)
    {

   return $this->connection->query($query);

    }



    public function __destruct()
    {
        $this->connection = null;
    }
}