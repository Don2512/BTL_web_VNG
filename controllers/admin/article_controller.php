<?php
require_once('controllers/base_controller.php');
require_once('models/article.php');

class ArticleController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'views/admin/articles';
    }

    public function index()
    {
        $articles = Article::getNewArticle();
        $articles = array("articles" => $articles);
        $this->render('index', $articles);
        
    }


}