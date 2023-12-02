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
        print_r($_POST);
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $type = $_POST['type'];
        $author_id = $_POST['authorId'];
        Article::addNewArticle($title, $subtitle, $type, $author_id);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function edit()
    {
        print_r($_POST);
        $article_id= $_POST['editArticleId'];
        $title = $_POST['editTitle'];
        $subtitle = $_POST['editSubtitle'];
        $type = $_POST['editType'];
        $author_id = $_POST['editAuthorId'];
        Article::editArticle($article_id, $title, $subtitle, $type, $author_id);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function delete()
    {
        print_r($_POST);
        $article_id= $_POST['deleteArticleId'];

        Article::deleteArticleById($article_id);
        header('Location: index.php?page=admin&controller=articles&action=index');
    }


}