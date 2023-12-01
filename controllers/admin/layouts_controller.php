<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');

class LayoutsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'views/admin/layouts';
	}

	public function index()
	{
		$List_Product = Product::getAllProduct();
		$this->render('index', $List_Product);
	}
}
