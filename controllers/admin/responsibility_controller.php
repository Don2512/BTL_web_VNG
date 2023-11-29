<?php
require_once('controllers/base_controller.php');

class LayoutsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'views/main/layouts';
	}

	public function index()
	{
        
		$this->render('responsibility', $List_Product);
	}

}
