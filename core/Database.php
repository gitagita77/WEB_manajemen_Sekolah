<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public $conn;
    public $error;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->conn->connect_error) {
            $this->error = "Connection failed: " . $this->conn->connect_error;
            die($this->error);
        }
    }

    // Prepare statement
    public function query($sql)
    {
        return $this->conn->prepare($sql);
    }

    // Direct query (for non-prepared like specific selects)
    public function rawQuery($sql)
    {
        return $this->conn->query($sql);
    }

    public function escape($string)
    {
        return $this->conn->real_escape_string($string);
    }

    public function getLastId()
    {
        return $this->conn->insert_id;
    }
}
