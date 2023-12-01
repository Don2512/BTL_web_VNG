<?php
require_once('controllers/base_controller.php');
require_once('models/article.php');

class ArticlesController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'views/admin/articles';
    }

    public function index()
    {
        $articles = Article::getAllArticles();
        $articles = array("articles" => $articles);
        $this->render('index', $articles);   
    }

    public function add()
    {
        
    }

    public function edit()
    {

    }

    public function delete()
    {

    }


}