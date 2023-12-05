<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');

class ProductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'views/admin/products';
	}

	public function index()
	{
		$products = Product::getAllProduct();
        $products = array("products" => $products);
		$this->render('index', $products);
	}

    public function add()
    {
        print_r($_POST);
        $category = $_POST['addCategory'];
        $name = $_POST['addName'];
        $price = $_POST['addPrice'];
        $image = $_POST['addImage'];

        Product::addNewProduct($category, $name, $price, $image);

        header('Location: index.php?page=admin&controller=products&action=index');
    }

    public function edit()
    {
        $product_id = $_POST['editProductId'];
        $category = $_POST['editCategory'];
        $date_added = $_POST['editDateAdded'];
        $name = $_POST['editName'];
        $price = $_POST['editPrice'];
        $image = $_POST['editImage'];

        Product::editProductById($product_id, $category, $date_added, $name, $price, $image);

        header('Location: index.php?page=admin&controller=products&action=index');
    }

    public function delete()
    {
        $product_id= $_POST['deleteProductId'];

        Product::deleteProductById($product_id);

        header('Location: index.php?page=admin&controller=products&action=index');
    }
}
