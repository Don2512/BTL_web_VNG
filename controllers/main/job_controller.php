<?php


require_once('controllers/base_controller.php');

class JobController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/job';
    }

    public function index()
    {
        $this->render('index');
    }
}
