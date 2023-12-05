<?php
require_once('controllers/base_controller.php');
require_once('models/Article.php');
require_once('models/CustomerComment.php');

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


    public function article()
    {
        $article = Article::getByIDArticle($_GET['article_id']);
        $newAarticle = Article::getNewArticle($_GET['article_id']);
        $comment = CustomerComment::getByIDCustomerComment($_GET['article_id']);
        $data = [
            "article"       => $article,
            "newAarticle"   => $newAarticle,
            "comment"       => $comment
        ];

        $this->render('article', $data);
    }

    public function addComment()
    {
        $comment = new CustomerComment(1, $_POST['customer_id'], $_POST['content'], "", $_POST['article_id']);
        CustomerComment::addCustomerComment($comment);
    }

    public function deleteComment()
    {
        // Nhận dữ liệu từ yêu cầu POST
        $requestData = json_decode(file_get_contents('php://input'));

        // Gọi hàm xóa comment với dữ liệu nhận được
        $result = CustomerComment::deleteCustomerComment(
            $requestData->customer_id,
            $requestData->article_id,
            $requestData->time_commented
        );

        echo json_encode(['message' => "ok"]);
    }

    public function getByType()
    {
        $result = Article::getByTypeArticle($_GET['type']);

        echo json_encode(['message' => $result]);
    }
}
