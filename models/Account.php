<?php
require_once('connection.php');

class Account
{
    // sign in check
    public static function checkSignInCustomerAccount($username, $password)
    {
        $password = md5($password);
        $query = "
            SELECT * FROM CustomerAccount
            WHERE username = '$username' and password = '$password';
        ";
        $request = DB::_Query($query);
        $result = [];
        if (empty($request->fetch_all(MYSQLI_ASSOC)))
            return false;
        else return true;
    }
    public static function checkSignInEmployeeAccount($username, $password)
    {
        $password = md5($password);
        $query = "
            SELECT * FROM EmployeeAccount
            WHERE username = '$username' and password = '$password';
        ";
        $request = DB::_Query($query);
        $result = [];
        if (empty($request->fetch_all(MYSQLI_ASSOC)))
            return false;
        else return true;
    }
    public static function checkSignInAccount($username, $password, $role)
    {
        if ($role == "customer") {
            if (Account::checkSignInCustomerAccount($username, $password)) {
                $_SESSION['customer_id'] = Account::getCustomerIdByUsername($username);
                return "customer";
            }
        } else {
            if (Account::checkSignInEmployeeAccount($username, $password)) {
                $_SESSION['employee_id'] = Account::getCustomerIdByUsername($username);
                return "employee";
            }
        }
        return "guest";
    }
    // add account
    public static function addCustomer($name, $age, $email, $gender)
    {
        
        $query = "
            INSERT INTO Customer
            (customer_name,age,email,gender)
            VALUES
            ('$name','$age','$email','$gender')
        ";
        DB::_Query($query);
    }
    public static function addCustomerAccount($id, $username, $password)
    {
        $password = md5($password);
        $query = "
            INSERT INTO CustomerAccount
            (customer_id,username,password)
            VALUES
            ($id,'$username', '$password');
        ";
        DB::_Query($query);
    }
    public static function getCustomerIdByEmail($email)
    {

        $query = "
            SELECT customer_id FROM Customer
            WHERE email = '$email';
        ";
        $request = DB::_Query($query);
        $result = $request->fetch_all(MYSQLI_ASSOC);
        if (!empty($result)) {
            return $result[0]["customer_id"];
        }
        return "not found";
    }
    public static function getCustomerIdByUsername($username)
    {
        $query = "
            SELECT customer_id FROM CustomerAccount
            WHERE username = '$username';
        ";
        $request = DB::_Query($query);
        $result = $request->fetch_all(MYSQLI_ASSOC);
        if (!empty($result)) {
            return $result[0]["customer_id"];
        }
        return "not found";
    }
    // sign up check
    public static function checkSignUp($name, $age, $email, $gender, $username, $password)
    {
        if (!Account::checkSignUpEmail($email))
            echo "usedEmail";
        else if (!Account::checkSignUpUsername($username))
            echo "usedUsername";
        else {
            Account::addCustomer($name, $age, $email, $gender);
            Account::addCustomerAccount(Account::getCustomerIdByEmail($email), $username, $password);
            echo "added account";
        }
    }
    public static function checkSignUpUsername($username)
    {
        $query = "
            SELECT * FROM CustomerAccount
            WHERE username = '$username';
        ";
        $request = DB::_Query($query);
        $result = [];
        if (empty($request->fetch_all(MYSQLI_ASSOC)))
            return true;
        else return false;
    }
    public static function checkSignUpEmail($email)
    {
        $query = "
            SELECT * FROM Customer
            WHERE email = '$email';
        ";
        $request = DB::_Query($query);
        if (empty($request->fetch_all(MYSQLI_ASSOC)))
            return true;
        else return false;
    }
    public static function getCustomerNameById($id)
    {
        $query = "
            SELECT name FROM Customer
            WHERE id = $id;
        ";
        $request = DB::_Query($query);
        $result = $request->fetch_all(MYSQLI_ASSOC);
        return $result[0];
    }
}
