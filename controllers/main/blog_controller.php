<?php


require_once('controllers/base_controller.php');

class BlogController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/blog';
    }

    public function index()
    {
        $this->render('index');
    }
}
