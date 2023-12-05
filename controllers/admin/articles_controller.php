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
        $title = $_POST['addTitle'];
        $subtitle = $_POST['addSubtitle'];
        $type = $_POST['addType'];
        $author_id = $_POST['addAuthorId'];
        Article::addNewArticle($title, $subtitle, $type, $author_id);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function edit()
    {
        $article_id = $_POST['editArticleId'];
        $title = $_POST['editTitle'];
        $subtitle = $_POST['editSubtitle'];
        $type = $_POST['editType'];
        $author_id = $_POST['editAuthorId'];
        Article::editArticleById($article_id, $title, $subtitle, $type, $author_id);

        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function delete()
    {
        $article_id = $_POST['deleteArticleId'];

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

        $content = Article::getAllContentOfAnArticleByIdAndTitle($article_id, $content_title);

        // Send JSON response to frontend
        header('Content-Type: application/json');
        echo json_encode($content);
        exit;
    }

    public function addContent()
    {
        $article_id = $_POST['addContentArticleId'];
        $title = $_POST['addContentTitle'];
        $content = $_POST['addContentText'];
        $link = $_POST['addContentImage'];

        Article::addContentWithArticleId($article_id, $title, $content, $link);
        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function editContent()
    {

        $article_id = $_POST['editContentArticleId'];
        $title = $_POST['editContentTitle'];
        $content = $_POST['editContentText'];
        $link = $_POST['editContentImage'];

        Article::editContentByArticleIdAndContentTitle($article_id, $title, $content, $link);
        header('Location: index.php?page=admin&controller=articles&action=index');
    }

    public function deleteContent()
    {

        $article_id = $_POST['deleteContentArticleIdField'];
        $title = $_POST['deleteContentTitle'];

        Article::deleteContentByArticleIdAndContentTitle($article_id, $title);
        header('Location: index.php?page=admin&controller=articles&action=index');
    }
}
