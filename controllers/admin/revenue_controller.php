<?php
require_once('controllers/base_controller.php');
require_once('models/Purchase.php');
class revenueController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/admin/revenue';
    }

    public function index()
    {

        $dataPoints = Purchase::getRevenue();

        $data = array(
            "dataPoints" => $dataPoints,
        );
         
        $this->render('index', $data);
    }
}
