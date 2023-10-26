<?php
class DB
{
    public static $instance = NULL;

    public static function getInstance(): Singleton
    {
        if (!isset(self::$instance)) 
        {
            self::$instance = mysqli_connect("localhost", "root", "", "BTL_WEB_231");
            if (mysqli_connect_errno())
            {
                die("Failed to connect to MySQL: " . mysqli_connect_error());
            }
        }

        return self::$instance;
    }


    public static function Query($query)
    {
        $db = DB::getInstance();
        return $bd->query($query);
    }
}
