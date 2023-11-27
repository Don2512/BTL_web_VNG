<?php


require_once('controllers/base_controller.php');

class AboutController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/about';
    }

    public function index()
    {
        $this->render('index');
    }
}
