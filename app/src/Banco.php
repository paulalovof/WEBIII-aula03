<?php
class Banco
{
    private $host = 'localhost';
    private $dbname = 'aula3';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
    }

    public function getConexao()
    {
        return $this->connection;
    }
}