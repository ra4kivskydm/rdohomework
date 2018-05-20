<?php
// Singleton
class DbConnection
{
    private static $instance;
    /**
     * @var mysqli
     */
    private $mysqli;

    private function __construct()
    {
        $this->mysqli = new mysqli('127.0.0.1', 'root', '', 'dzha');
        $this->mysqli->query('SET NAMES utf8');
    }

    private function __clone(){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * @return mysqli
     */
    public function getMysqli()
    {
        return $this->mysqli;
    }
}