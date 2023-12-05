<?php


require_once('controllers/base_controller.php');

class ProductController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/product';
    }

    public function index()
    {
        $this->render('index');
    }

    public function game()
    {
        $this->render('game');
    }

    public function connection()
    {
        $this->render('connection');
    }

    public function digital()
    {
        $this->render('digital');
    }

    public function bill()
    {
        $this->render('bill');
    }
}
