<?php
require_once('connection.php');

class Administrator {
    public  $username;
    public  $password;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    static function addAccount($username, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $database = DB::getInstance();

        $request = $database->query("INSERT INTO administrator (username, password) VALUES ('$username', '$password');");  
        return $request;
    }

    static function deleteAccount($username) {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM administrator WHERE username = '$username';");
        
        return $request;
    }

    static function adminValidation($username, $password) {
        $database = DB::getInstance();
        $request = $database->query("SELECT password FROM administrator WHERE username = '$username';");
        if (@password_verify($password, $request->fetch_assoc()['password'], PASSWORD_DEFAULT)) {
            return true;
        }

        return false;
    }

    static function changeAdminPassword($username, $oldPassword, $newPassword) {
        if (Administrator::adminValidation($username, $oldPassword)) {
            $password = password_hash($newPassword, PASSWORD_DEFAULT);
            $database = DB::getInstance();
            $request = $database->query("UPDATE administrator SET password = '$password' WHERE username = '$username';");
            
            return $request;
        }
        
        return false;
    }

    static function changeUserPassword($username, $newPassword) {
        $password = password_hash($newPassword, PASSWORD_DEFAULT);
        $database = DB::getInstance();
        $request = $database->query("UPDATE administrator SET password = '$password' WHERE username = '$username';");
        return $request;
    }

    static function getAllAdminAttribute() {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM administrator");
        $administrator = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $adminData) {
            $administrator = new Administrator($adminData['username'], $adminData['password']);
        }

        return $administrator;
    }
}