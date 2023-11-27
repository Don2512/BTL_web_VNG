<?php


require_once('controllers/base_controller.php');

class SocietyController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/society';
    }

    public function index()
    {
        $this->render('index');
    }
}
