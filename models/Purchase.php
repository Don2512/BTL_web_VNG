<?php
require_once('connection.php');

class Purchase{
    public $customer_id;
    public $product_id;
    public $number;
    public $purchase_date;
    public $product_name;
    public $image;
    public $price;

    public function __construct($customer_id, $product_id, $number, $purchase_date, $product_name = "", $image = "", $price = 1) {
        $this->customer_id = $customer_id;
        $this->product_id = $product_id;
        $this->number = $number;
        $this->purchase_date = $purchase_date;
        $this->product_name = $product_name;
        $this->image = $image;
        $this->price = $price;
    }

    public static function getByIDPurchase($customer_id)
    {
        //* query
        $query = "
            SELECT
                P.customer_id,
                P.product_id,
                P.number,
                P.purchase_date,
                PR.name,
                PR.image,
                PR.price
            FROM Purchase P 
            JOIN Product PR ON P.product_id = PR.product_id
            WHERE  P.customer_id = $customer_id
            ORDER BY P.purchase_date DESC;            
        ";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $temp) {
            $result[] = new Purchase(
                $temp["customer_id"], 
                $temp["product_id"], 
                $temp["number"], 
                $temp["purchase_date"],
                $temp["name"],
                $temp["image"],
                $temp["price"]
            );
        }
        return $result;
    }

    public static function insertAllPurchase($array)
    {
        $values = [];
        foreach ($array as $value) {
            $values[] = sprintf(
                '(%d, %d, %d, NOW())',
                $value->customer_id,
                $value->product_id,
                $value->number
            );
        }
        $valuesString = implode(', ', $values);

        $query = "
            INSERT INTO Purchase (customer_id, product_id, number, purchase_date) 
            VALUES $valuesString
        ";

        DB::_Query($query);
    }
    


    public static function getnumberPurchaseWeek($customer_id)
    {
        //* query
        $query = "
                SELECT
                SUM(number) AS total_items,
                DAYOFWEEK(purchase_date) AS day_of_week
            FROM
                Purchase
            WHERE
                customer_id = $customer_id
                AND purchase_date >= CURDATE() - INTERVAL (DAYOFWEEK(CURDATE()) - 2) DAY
                AND purchase_date < CURDATE() + INTERVAL (8 - DAYOFWEEK(CURDATE())) DAY
            GROUP BY
                day_of_week;        
        ";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $temp) {
            $result[] = $temp['total_items'];
        }
        return $result;
    }

}