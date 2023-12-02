<?php
require_once('connection.php');

class Product{
    public $product_id;
    public $category;
    public $date_added;
    public $price;
    public $name;
    public $image;

    public function __construct($product_id, $category, $date_added, $price, $name, $image)
    {
        $this->product_id = $product_id;
        $this->category = $category;
        $this->date_added = $date_added;
        $this->price = $price;
        $this->name = $name;
        $this->image = $image;
    }


    public static function getAllProduct()
    {
        //* query
        $query = "SELECT * FROM Product";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $product) {
            $result[] = new Product($product["product_id"], $product["category"], 
                            $product["date_added"], $product["price"], $product["name"], $product["image"]);
        }
        return $result;
    }


}

