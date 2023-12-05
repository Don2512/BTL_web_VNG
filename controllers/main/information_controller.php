<?php
require_once('controllers/base_controller.php');
require_once('models/Purchase.php');
require_once('models/customer.php');

class informationController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/information';
    }

    public function index()
    {
        $customer_id = $_SESSION['customer_id'];
        $purchase = Purchase::getnumberPurchaseWeek($customer_id);
        $dataPoints = array(
            array("y" => 0, "label" => "Thứ 2"),
            array("y" => 0, "label" => "Thứ 3"),
            array("y" => 0, "label" => "Thứ 4"),
            array("y" => 0, "label" => "Thứ 5"),
            array("y" => 0, "label" => "Thứ 6"),
            array("y" => 0, "label" => "Thứ 7"),
            array("y" => 0, "label" => "Chủ nhật")
        );
        for ($i = 0; $i < count($purchase); $i++) {
            $dataPoints[$i]['y'] = $purchase[$i];
        }



        $customer = Customer::getByIdCustomer($customer_id);

        $data = array(
            "dataPoints" => $dataPoints,
            "customer" => $customer,
        );

        $this->render('index', $data);
    }

    public function purchaseHistory()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] == "guest") {
            header("Location: ?page=main&controller=login&action=signin");
            exit();
        }
        $customer_id = $_SESSION['customer_id'];

        $purchase = Purchase::getByIDPurchase($customer_id);
        $current_page = isset($_GET['numberpage']) ? $_GET['numberpage'] : 1;
        $total_pages =  ceil(count($purchase) / 7);
        $data = array(
            "cart" => array_slice($purchase, ($current_page - 1) * 7, 7),
            "total_pages" => $total_pages
        );

        $this->render('purchaseHistory', $data);
    }

    public function updateCustomer()
    {
        if (!isset($_POST['customer_id'])) return;
        $customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : '';
        $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
        $age = isset($_POST['age']) ? $_POST['age'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

        Customer::edit($customer_id, $customer_name, $age, $email, $gender);
    }
}
