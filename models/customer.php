<?php
require_once('connection.php');

class Customer{
    public $customer_id;
    public $customer_name;
    public $age;
    public $email;
    public $gender;

    public function __construct($customer_id,$customer_name,$age, $email,$gender)
    {
        $this->customer_id=$customer_id;
        $this->customer_name=$customer_name;
        $this->age=$age;
        $this->email=$email;
        $this->gender=$gender;
    }
    static function insert($customer_name,$age,$email,$gender) {
        $database = DB::getInstance();
        $request = $database->query("INSERT INTO customer (customer_name,age,email,gender) 
                                    VALUES ('$customer_name','$age','$email','$gender');");
        
        return $request;
    }
    static function edit($customer_id,$customer_name,$age,$email,$gender)
    {
        $database = DB::getInstance();
        $request = $database->query(
            "
            UPDATE customer
            SET customer_name = '$customer_name',
            age = '$age',
            email = '$email',
            gender = '$gender'
            WHERE customer_id = '$customer_id'
            ;"
        );
        return $request;
    }
    static function delete($customer_id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM customer WHERE customer_id = '$customer_id';");
        return $req;
    }
    public static function getAllCustomer()
    {
        //* query
        $query = "SELECT * FROM customer";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $customer) {
            $result[] = new Customer($customer["customer_id"], $customer["customer_name"], $customer["age"],  $customer["email"],$customer["gender"]);
        }
        return $result;

        
    }


}
