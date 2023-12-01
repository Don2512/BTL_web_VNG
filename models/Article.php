<?php
require_once('connection.php');

class Content
{
    public $title;
    public $content;
    public $image;

    public function __construct($title, $content, $image)
    {
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
    }
}
class Article
{
    public $id;
    public $type;
    public $date;
    public $title;    
    public $contentTitle;
    public $content;

    

    public function __construct($id, $type, $date, $title, $content) {
        $this->id = $id;
        $this->type = $type;
        $this->date = $date;
        $this->title = $title;
        $this->content = $content;
    }

    public static function getByIDArticle($article_id)
    {
        //* query
        $query = "SELECT * FROM Article WHERE article_id = $article_id";
        $request = DB::_Query($query);
    
        //* get
        $temp =$request->fetch_assoc();
        $result = new Article($temp["article_id"], $temp["type"], 
                            $temp["time_published"], $temp["title"],$temp["content"], []);

        //* query
        $query = "SELECT * FROM Content WHERE article_id = $article_id";
        $queryContent = DB::_Query($query);

        //* get
        foreach ($queryContent->fetch_all(MYSQLI_ASSOC) as $Content) {
            $result->content[] = new Content($Content["title"],$Content["content"], $Content["link"]);
        }
        return $result;
    }

    public static function getNewArticle($article_id)
    {
        //* query
        $query = "
            SELECT * FROM Article
            WHERE article_id != $article_id
            ORDER BY time_published DESC
            LIMIT 3;
        ";
        $request = DB::_Query($query);
    
        //* get
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $temp) {
            $result[] = new Article($temp["article_id"], $temp["type"], 
            $temp["time_published"], $temp["title"],$temp["content"], []);
        }
        return $result;
    }

    public static function getByTypeArticle($type)
    {
        //* query
        $query = "SELECT * FROM Article WHERE type = '$type'";
        if($type == "all" ) $query = "SELECT * FROM Article";
        $request = DB::_Query($query);
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $temp) {
            $result[] = new Article($temp["article_id"], $temp["type"], 
            $temp["time_published"], $temp["title"],$temp["content"], []);
        }   
        
        return $result;
    }

    public static function getAllContentsOfAnArticleById($article_id)
    {
        $database = DB::getInstance();
        $request = $database->query(
            "SELECT *
            FROM Content
            WHERE article_id = $article_id;
        ");
        $Contents = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $content) {
            $Contents[] = new Content(
                                $content['title'], 
                                $content['content'], 
                                $content['link']
            );
        }

        return $Contents;
    }

    public static function getArtibleById($article_id) 
    {

    }

}


?>

