<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of DBBroker
 *
 * @author PECA
 */
class DBBroker {
    private $mysqli;
    

    public function __construct(string $database,string $username,string $password,string $server) 
    {
        $mysql_server = $server;
        $mysql_user = $username;
        $mysql_password = $password;
        $mysql_db = $database;
        $this->mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
        if ($this->mysqli->connect_errno) 
        {
            die("ERR: ".$this->mysqli->connect_error);
        }
        $this->mysqli->set_charset("utf8");
    }
  
    public function executeQuery(string $query)
    {
        $ret = [];
       // $comm = $query;
        $q = $this->mysqli->query($query);
            while ($row = $q->fetch_assoc())
            {
                $ret[] = $row;
            }
        
        return $ret;
    }
    
    public function executeNonQuery(string $nonquery)
    {
        //$comm = $nonquery;
        $q = $this->mysqli->query($nonquery);
        return $q;
    }
    
}
