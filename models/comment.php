<?php
require_once('connection.php');

class Comment{
    public $employee_id;
    public $employee_name;
    public $article_id;
    public $content;
    public $time_commented;

    public function __construct($employee_id,$article_id,
    $content, $time_commented, $employee_name,$article_title)
    {
        $this->employee_id = $employee_id;
        $this->article_id = $article_id;
        $this->content = $content;
        $this->time_commented= $time_commented;
        $this->employee_name = $employee_name;
        $this->article_title=$article_title;
    }
    public static function getAllComment()
    {
        //* query
        $query = "SELECT comment.employee_id, comment.article_id, comment.content, comment.time_commented, employee.employee_name, article.title FROM comment 
        LEFT JOIN employee on comment.employee_id=employee.employee_id
        LEFT JOIN article on comment.article_id=article.article_id";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $comment) {
            $result[] = new Comment($comment["employee_id"], $comment["article_id"], $comment["content"], $comment["time_commented"], $comment["employee_name"],$comment["title"]);
        }
        return $result;
    }
    static function update($article_id,$content)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
            UPDATE comment
            SET content = '$content'
            WHERE article_id = '$article_id'
            ;"
        );
        return $req;
    }
    
    static function delete($article_id,$employee_id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM comment WHERE article_id = '$article_id' AND employee_id='$employee_id';");
        return $req;
    }
    


}
