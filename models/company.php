<?php
require_once('connection.php');

class Company {
    public  $id;
    public  $name;
    public  $address;
    public  $createAt;
    public  $updateAt;

    public function __construct($id, $name, $address, $createAt, $updateAt) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
    }

    static function getAllCompanyAttribute() {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM company");
        $companyAttrs = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $companyData) {
            $companyAttrs[] = new Company(
                                            $companyData['id'], 
                                            $company['name'], 
                                            $company['address'], 
                                            $company['createAt'], 
                                            $company['updateAt']
                                        );
        }
        
        return $companyAttrs;
    }

    static function getCompanyAttributeById($id) {
        $databa = DB::getInstance();
        $request = $database->query("SELECT * FROM company WHERE id = $id");
        $result = $request->fetch_assoc();
        $company = new Company($result['id'], $result['name'], $result['address'], $result['createAt'], $result['updateAt']);
        
        return $company;
    }

    static function insertCompanyAttrbute($name, $address) {
        $database = DB::getInstance();
        $request = $database->query("INSERT INTO company (name, address, createAt, updateAt) VALUES ('$name', '$address', NOW(), NOW());");
        
        return $requestu;
    }

    static function deleteCompanyById($id) {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM company WHERE id = $id;");

        return $request;
    }

    static function updateCompanyAttributeById($id, $name, $address) {
        $database = DB::getInstance();
        $request = $database->query("UPDATE company SET name = '$name', address = '$address', updateAt = NOW() WHERE id = $id;");
        
        return $request;
    }
}