<?php
require_once('controllers/base_controller.php');
require_once('models/customer.php');

class CustomersController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'views/admin/customers';
    }

    public function index()
    {
        $customers = Customer::getAllCustomer();
        $customers = array("customers" => $customers);
        $this->render('index', $customers);   
    }

    public function add()
    {
        $customer_name=$_POST['name'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        Customer::insert($customer_name,$age,$email,$gender);
        header('Location: index.php?page=admin&controller=customers&action=index');
    }

    public function edit()
    {
        $customer_id = $_POST['id'];
        $customer_name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        Customer::edit($customer_id,$customer_name,$age,$email,$gender);
        header('Location: index.php?page=admin&controller=customers&action=index');
    }

    public function delete()
    {
        $customer_id=$_POST['customer_id'];
        $delete_customer=Customer::delete($customer_id);
        header('Location: index.php?page=admin&controller=customers&action=index');
    }


}