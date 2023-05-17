<?php

abstract class Conn
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "roger4";
    public int $port = 3306;
    public object $connect;

    public function connectDb()
    {
        try{
            
            
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname='. $this->dbname, $this->user, $this->pass);
            
            return $this->connect;
        }catch (Exception $err){
           
        }
    }
}