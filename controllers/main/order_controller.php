<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');

class OrderController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/order';
    }

    public function index()
    {
        $Product = Product::getAllProduct();
        $current_page = isset($_GET['numberpage']) ? $_GET['numberpage'] : 1;
        $total_pages =  ceil(count($Product) / 6);

        $data  = array(
            "Product" => array_slice($Product, ($current_page - 1)*6, 6),
            "total_pages" => $total_pages
        );

        $this->render('index', $data);
    }

    public function myOrder()
    {
        //! tạo session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        //! thêm
        if(isset($_POST["mua"]))
        {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $number = $_POST["number"];
            $image = $_POST["image"];
            $category = $_POST["category"];

            if (isset($_SESSION['cart'][$id]) ) {
                $_SESSION['cart'][$id]['number'] += $number;
            } else {
                $_SESSION['cart'][$id] = array(
                    'name' => $name,
                    'price' => $price,
                    'number' => $number,
                    'image'=> $image,
                    'category'=> $category  
                );
            }
        }

        //! xóa
        if (isset($_GET['remove_id'])) {
            $remove_id = $_GET['remove_id'];
            if (isset($_SESSION['cart'][$remove_id])) {
                unset($_SESSION['cart'][$remove_id]);
            }
        }


        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['number'];
        }



        $data = array(
            "cart" => $_SESSION['cart'],
            "total" => $total
        );

        $this->render('myOrder', $data);
    }

    public function payment()
    {
        $sessionData = $_SESSION['cart'];
        $_SESSION['cart'] = array();
    }
}