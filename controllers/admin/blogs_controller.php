<?php
require_once('controllers/base_controller.php');
require_once('models/blogs.php');

class BlogsController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'view/admin/blogs';
    }

    public function index()
    {
        $List_blogs = Blog::getLastBlog();
        $this->render('index', $List_blogs);
    }
}