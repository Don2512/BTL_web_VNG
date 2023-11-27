<?php


require_once('controllers/base_controller.php');

class LoginController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/login';
    }

    public function index()
    {
        $this->render('index');
    }
}
