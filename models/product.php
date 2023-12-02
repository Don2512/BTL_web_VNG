<?php
require_once('connection.php');

class Product{
    public $id;
    public $category;
    public $date_added;
    public $price;
    public $name;
    public $image;

    public function __construct($id, $category, $date_added, $price, $name, $image)
    {
        $this->id = $id;
        $this->category = $category;
        $this->date_added = $date_added;
        $this->price = $price;
        $this->name = $name;
        $this->image = $image;
    }


    public static function getAllProduct()
    {
        //* query
        $query = "SELECT * FROM Product ORDER BY product_id ";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $product) {
            $result[] = new Product(
                $product["product_id"], 
                $product["category"], 
                $product["date_added"], 
                $product["price"],
                $product["name"],
                $product["image"]
            );
        }
        return $result;
    }

    public static function addNewProduct($category, $date_added, $name, $price, $image) 
    {
        $database = DB::getInstance();
        $time_published= date("Y-m-d-h-i-s");
        $request = $database->query
        (
            "INSERT INTO Product (category ,date_added, price, name, image)
                VALUE ('$category', '$date_added', '$name', '$price', '$image');"
                        
        );

        return $request;
    }

    public static function editProductById($product_id, $category, $date_added, $name, $price, $image)
    {
        $database = DB::getInstance();
        $date_added= date("Y-m-d-h-i-s");
        
        $query = "UPDATE Product SET date_added = '$date_added', ";
        if ($category != '') {
            $query .= "category = '$category',";
        } 
        if ($name != '') {
            $query .= "name = '$name',";
        } 
        if ($price != '') {
            $query .= "price = '$price',";
        } 
        if ($image != '') {
            $query .= "image = '$image'";
        } 

        if ($query[strlen($query)-1] == ',') {
            $query[strlen($query)-1] = ' ';
        }
        $query .= "WHERE product_id = $product_id;";

        echo $query;
        $request = $database->query($query);

        return $request;
    }

    public static function deleteProductById($product_id)
    {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM Product WHERE product_id = $product_id;");
        return $request;
    }


}