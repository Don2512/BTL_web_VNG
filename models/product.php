<?php
require_once('connection.php');

class Product{
    public $product_id;
    public $category;
    public $date_added;
    public $price;

    public function __construct($product_id, $category, $date_added, $price)
    {
        $this->product_id = $product_id;
        $this->category = $category;
        $this->date_added = $date_added;
        $this->price = $price;
    }


    public static function getAllProduct()
    {
        //* query
        $query = "SELECT * FROM Product";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $product) {
            $result[] = new Product($product["product_id"], $product["category"], $product["date_added"], $product["price"]);
        }
        return $result;
    }


}

