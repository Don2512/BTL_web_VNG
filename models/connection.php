<?php


class DB{
    public static $connection = NULL;

    public static function getInstance()
    {
        if(self::$connection == NULL)
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            try{
                self::$connection = new mysqli($servername, $username, $password, "VNG");
            }
            catch(Exception $err){
                die("Connection failed: " . $err);
            }     
        }
        return self::$connection;
    }


    public static function _Query($query)
    {
        $conn = self::getInstance();
        try
        {
            $result = $conn->query($query);
            return $result;
        }
        catch(Exception $err){
            die("failed: " . $err);
        }             
    }
}
