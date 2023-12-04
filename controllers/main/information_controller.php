<?php
require_once('controllers/base_controller.php');
require_once('models/Purchase.php');
class informationController extends BaseController
{
	function __construct()
	{
		$this->folder = 'views/main/information';
	}

	public function index()
	{
		$this->render('index');
	}

    public function purchaseHistory()
    {
        $customer_id = $_SESSION['customer_id'];

        $purchase = Purchase::getByIDPurchase($customer_id);
        $current_page = isset($_GET['numberpage']) ? $_GET['numberpage'] : 1;
        $total_pages =  ceil(count($purchase) / 7);
        $data = array(
            "cart" => array_slice($purchase, ($current_page - 1)*7, 7),
            "total_pages" => $total_pages
        );

        $this->render('purchaseHistory', $data);
    }

}