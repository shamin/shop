<?php

class db {
    protected static $connection;

    private function connect()
    {
        $hostname = 'localhost';
        $username = 'root';
        $pass = '';
        $database = 'shop';
        
  
        if(!isset(self::$connection))
        {  
            self::$connection = new mysqli( $hostname , $username , $pass , $database);
        }
         if(self::$connection == FALSE)
        {
             return FALSE;
        }
        return self::$connection;
    }
    
    
    public function query($query)
    {
        $connection = $this->connect();
        return $connection->query($query);
    }
    
    public function select($query)
    {
        $rows = array();
        $result = $this->query($query);
        if($result == FALSE)
        {
            return FALSE;
        }
        while ($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }
}
