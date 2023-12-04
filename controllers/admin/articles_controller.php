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
        Article::editArticleById($article_id, $title, $subtitle, $type, $author_id);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function delete()
    {
        print_r($_POST);
        $article_id= $_POST['deleteArticleId'];

        Article::deleteArticleById($article_id);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function getContent()
    {
        $article_id = $_POST['getContentId'];
        $contents = Article::getAllContentsOfAnArticleById($article_id);
    
        // Send JSON response to frontend
        header('Content-Type: application/json');
        echo json_encode($contents);
        exit;
    }

    public function getContentByTitle()
    {
        $article_id = $_POST['getContentId'];
        $content_title = $_POST['selectedContentId'];
        echo $content_title;
        $content = Article::getAllContentOfAnArticleByIdAndTitle($article_id, $content_title);

        // Send JSON response to frontend
        header('Content-Type: application/json');
        echo json_encode($content);
        exit;
    }

    public function editContent()
    {
        print_r($_POST);
        $article_id = $_POST['editContentArticleId'];
        $title = $_POST['editContentTitle'];
        $content = $_POST['editContentContent'];
        $link = $_POST['editContentLink'];

        Article::editContentByArticleIdAndContentTitle($article_id, $title, $content, $link);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function deleteContent()
    {
        print_r($_POST);

        $article_id = $_POST['deleteContentArticleId'];
        $title = $_POST['deleteContentTitle'];

        Article::deleteContentByArticleIdAndContentTitle($article_id, $title);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }


}