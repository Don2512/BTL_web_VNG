<?php


require_once('controllers/base_controller.php');

class HumanController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/human';
    }

    public function index()
    {
        $this->render('index');
    }
}
