<?php
require_once('connection.php');

class CustomerComment
{
    public $name_id;
    public $name;
    public $article_id;
    public $content;
    public $time_commented;

    
    public function __construct($name_id, $name, $content, $time_commented, $article_id) {
        $this->name = $name;
        $this->article_id = $article_id;
        $this->content = $content;
        $this->time_commented = $time_commented;
        $this->name_id = $name_id;
    }

    public static function getByIDCustomerComment($article_id)
    {
        //* query
        $query = "
            SELECT c.customer_id, c.customer_name, cm.article_id, cm.content, cm.time_commented
            FROM CustomerComment cm
            JOIN Customer c ON cm.customer_id = c.customer_id
            WHERE cm.article_id = $article_id;
        ";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $temp) {
            $result[] = new CustomerComment($temp["customer_id"], $temp["customer_name"], 
            $temp["content"], $temp["time_commented"], $temp["article_id"]);
        }
        return $result;
    }    

    public static function addCustomerComment($comment)
    {
        //* query
        $query = "
            INSERT INTO CustomerComment (customer_id, article_id, content, time_commented) VALUES
            ($comment->name_id, $comment->article_id, '$comment->content', NOW());
        ";
        //($comment->name_id, $comment->article_id, $comment->content, NOW());
        DB::_Query($query);        
    }

    public static function deleteCustomerComment($name_id, $article_id, $time_commented)
    {
        $query = "
            DELETE FROM CustomerComment 
            WHERE customer_id = $name_id AND 
                  article_id = $article_id AND 
                  time_commented = '$time_commented'";

        DB::_Query($query); 
    }
}
?>