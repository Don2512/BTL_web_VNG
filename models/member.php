<?php
require_once('connection.php');

class Member{
    public $employee_id;
    public $employee_name;
    public $age;
    public $position;
    public $phone;
    public $description;
    public $department;
    public $gender;
    public $branch;

    public function __construct($employee_id, $employee_name, $age, $position,$phone,$description,$department,$gender,$branch)
    {
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->age = $age;
        $this->position = $position;
        $this->phone= $phone;
        $this->description=$description;
        $this->department=$department;
        $this->gender=$gender;
        $this->branch=$branch;
    }
    static function insert($employee_name, $age, $position, $phone, $description, $department, $gender, $branch) {
        $database = DB::getInstance();
        $request = $database->query("INSERT INTO employee (employee_name, age, position, phone_number,description, department, gender, branch_id) 
                                    VALUES ('$employee_name', '$age', '$position', '$phone', '$description', '$department', '$gender', '$branch');");
        
        return $request;
    }
    static function edit($employee_id,$employee_name,$age, $position,$phone, $description,$department,$gender,$branch_id)
    {
        $database = DB::getInstance();
        $request = $database->query(
            "
            UPDATE employee
            SET employee_name = '$employee_name',
            age = '$age',
            position = '$position',
            phone_number= '$phone',
            description = '$description',
            department = '$department',
            gender = '$gender',
            branch_id = '$branch_id'
            WHERE employee_id = '$employee_id'
            ;"
        );
        return $request;
    }
    static function delete($employee_id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM employee WHERE employee_id = '$employee_id';");
        return $req;
    }
    public static function getAllMember()
    {
        //* query
        $query = "SELECT * FROM employee";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $member) {
            $result[] = new Member($member["employee_id"], $member["employee_name"], $member["age"], $member["position"], $member["phone_number"],$member["description"],$member["department"], $member["gender"],$member["branch_id"]);
        }
        return $result;
    }


}
