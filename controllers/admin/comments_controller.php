<?php
require_once('controllers/base_controller.php');
require_once('models/comment.php');

class CommentsController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'views/admin/comments';
    }

    public function index()
    {
        $comments = Comment::getAllComment();
        $comments = array("comments" => $comments);
        $this->render('index', $comments);   
    }

    public function add()
    {
        
    }

    public function edit()
    {
        $article_id = $_POST['article_id'];
        $content=$_POST['content'];
        Comment::update($article_id,$content);
        header('Location: index.php?page=admin&controller=comments&action=index');
    }

    public function delete()
    {
        $article_id = $_POST['article_id'];
        $delete_comment = Comment::delete($article_id);
        header('Location: index.php?page=admin&controller=comments&action=index');
    }
}