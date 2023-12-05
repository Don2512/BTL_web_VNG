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
    public $subtitle;

    // Content is a list of contents
    public $content;
    public $author_id;
    public $contentTitle;
    public $image;

    public function __construct($id, $type, $date, $title, $subtitle, $content, $author_id,  $contentTitle = "")
    {
        $this->id = $id;
        $this->type = $type;
        $this->date = $date;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->content = $content;
        $this->author_id = $author_id;
        $this->contentTitle = $contentTitle;
    }

    public static function getByIDArticle($article_id)
    {
        //* query
        $query = "SELECT * FROM Article WHERE article_id = $article_id";
        $request = DB::_Query($query);

        //* get
        $temp = $request->fetch_assoc();
        $result = new Article(
            $temp["article_id"],
            $temp["type"],
            $temp["time_published"],
            $temp["title"],
            $temp["content"],
            [],
            $temp["author_id"],
            $temp["content"]
        );

        //* query
        $query = "SELECT * FROM Content WHERE article_id = $article_id";
        $queryContent = DB::_Query($query);

        //* get
        foreach ($queryContent->fetch_all(MYSQLI_ASSOC) as $Content) {
            $result->content[] = new Content($Content["title"], $Content["content"], $Content["link"]);
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
            $result[] = new Article(
                $temp["article_id"],
                $temp["type"],
                $temp["time_published"],
                $temp["title"],
                $temp["content"],
                [],
                $temp["author_id"]
            );
        }
        return $result;
    }

    public static function getByTypeArticle($type)
    {
        //* query
        $query = "
            SELECT a.article_id article_id, a.type type, a.time_published time_published, a.title title, a.content content, a.author_id author_id, c.link link FROM Article a 
            LEFT JOIN Content c
            ON a.article_id = c.article_id
        ";
        // $query = "SELECT * FROM Article WHERE type = '$type';";
        if ($type != "all") $query .= "WHERE type = '$type' ";
        $query .= "GROUP BY a.article_id;";
        $request = DB::_Query($query);
        $result = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $temp) {
            $result[] = new Article(
                $temp["article_id"],
                $temp["type"],
                $temp["time_published"],
                $temp["title"],
                $temp["content"],
                $temp["link"],
                $temp["author_id"],
            );
        }

        return $result;
    }

    public static function getAllContentsOfAnArticleById($article_id)
    {
        $database = DB::getInstance();
        $request = $database->query(
            "SELECT *
            FROM Content
            WHERE article_id = '$article_id'
            ORDER BY article_id;
        "
        );

        $Contents = [];

        foreach ($request->fetch_all(MYSQLI_ASSOC) as $content) {
            $link = (gettype($content['link']) == NULL) ? "\"\"" : "\"" . $content['link'] . "\"";
            $Contents[] = new Content(
                $content['title'],
                $content['content'],
                $link
            );
        }

        return $Contents;
    }

    public static function getAllContentOfAnArticleByIdAndTitle($article_id, $title)
    {
        $database = DB::getInstance();
        $request = $database->query(
            "SELECT *
            FROM Content
            WHERE article_id = '$article_id' AND title = '$title'
            ORDER BY article_id;
        "
        );

        $Content = [];

        foreach ($request->fetch_all(MYSQLI_ASSOC) as $content) {
            $link = (gettype($content['link']) == NULL) ? "" : $content['link'];
            $Content[] = new Content(
                $content['title'],
                $content['content'],
                $link
            );
        }
        return $Content;
    }

    public static function getArticleById($article_id)
    {
        $database = DB::getInstance();
        $contents = Article::getAllContentsOfAnArticleById($article_id);

        $article_req = $database->query(
            "SELECT *
            FROM Article
            WHERE article_id = $article_id;
        "
        );
        $Article = [];
        foreach ($article_req->fetch_all(MYSQLI_ASSOC) as $art) {
            $Article[] = new Article(
                $art['article_id'],
                $art['type'],
                $art['time_published'],
                $art['title'],
                $art['content'],
                $contents,
                $art['author_id'],
            );
        }

        return $Article;
    }

    public static function getAllArticles()
    {
        $database = DB::getInstance();

        $articles_req = $database->query(
            "SELECT *
            FROM Article
            ORDER BY article_id;
        "
        );

        $Articles = [];
        foreach ($articles_req->fetch_all(MYSQLI_ASSOC) as $art) {
            $contents = Article::getAllContentsOfAnArticleById($art['article_id']);
            $Articles[] = new Article(
                $art['article_id'],
                $art['type'],
                $art['time_published'],
                $art['title'],
                $art['content'],
                $contents,
                $art['author_id'],
            );
        }


        return $Articles;
    }

    public static function addNewArticle($title, $subtitle, $type, $author_id)
    {
        $database = DB::getInstance();
        $time_published = date("Y-m-d-h-i-s");
        $request = $database->query(
            "INSERT INTO Article (type, title, time_published, author_id, content)
                VALUE ('$type', '$title', '$time_published', '$author_id', '$subtitle');"

        );

        return $request;
    }

    public static function editArticleById($article_id, $title, $subtitle, $type, $author_id)
    {
        $database = DB::getInstance();
        $time_published = date("Y-m-d-h-i-s");

        $query = "UPDATE Article SET time_published = '$time_published',";
        if ($title != '') {
            $query .= "title = '$title',";
        }
        if ($subtitle != '') {
            $query .= "content = '$subtitle',";
        }
        if ($type != '') {
            $query .= "type = '$type',";
        }
        if ($author_id != '') {
            $query .= "author_id = '$author_id',";
        }


        if ($query[strlen($query) - 1] == ',') {
            $query[strlen($query) - 1] = ' ';
        }
        $query .= "WHERE article_id = $article_id;";

        $request = $database->query($query);

        return $request;
    }

    public static function deleteArticleById($article_id)
    {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM Article WHERE article_id = $article_id;");
        return $request;
    }

    public static function addContentWithArticleId($article_id, $content_title, $content_content, $content_link)
    {
        $database = DB::getInstance();

        $request = $database->query(
            "INSERT INTO Content (article_id, title, content, link)
                VALUE ('$article_id', '$content_title', '$content_content', '$content_link');
            "

        );

        return $request;
    }

    public static function editContentByArticleIdAndContentTitle($article_id, $content_title, $content_content, $content_link)
    {
        $database = DB::getInstance();

        $query = "UPDATE Content SET ";
        if ($content_content != '') {
            $query .= "content = '$content_content',";
        }
        if ($content_link != '') {
            $query .= "link = '$content_link',";
        }

        if ($query[strlen($query) - 1] == ',') {
            $query[strlen($query) - 1] = ' ';
        }
        $query .= "WHERE article_id = '$article_id' AND title = '$content_title';";

        $request = $database->query($query);

        return $request;
    }

    public static function deleteContentByArticleIdAndContentTitle($article_id, $content_title)
    {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM Content WHERE article_id = '$article_id' AND title = '$content_title';");
        return $request;
    }
}
