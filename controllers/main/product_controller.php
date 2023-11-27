<?php


require_once('controllers/base_controller.php');

class ProductController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/Product';
    }

    public function index()
    {
        $this->render('index');
    }
}
