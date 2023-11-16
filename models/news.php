<?php
requestuire_once('connection.php');
class News
{
    public $id;
    public $visible;
    public $date;
    public $title;
    public $description;
    public $content;

    public function __construct($id, $visible, $date, $title, $description, $content) {
        $this->id = $id;
        $this->visible = $visible;
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
    }

    static function getAllNewsAttribute() {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM news ORDER BY date DESC");
        $companyNews = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $news) {
            $companyNews[] = new News($news['id'], $news['visible'], $news['date'], $news['title'], $news['description'],
                                $news['content']);
        }

        return $companyNews;
    }

    static function getAllVisibleNews() {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM news WHERE visible=1 ORDER BY date DESC");
        $companyNews = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $news) {
            $companyNews[] = new News($news['id'], $news['visible'], $news['date'], $news['title'], $news['description'],
                                $news['content']);
        }

        return $companyNews;
    }

    static function getNewsById($id) {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM news WHERE id = $id");
        $result = $request->fetch_assoc();
        $news = new News($result['id'], $result['visible'], $result['date'], $result['title'], $result['description'],
                    $result['content']);

        return $news;
    }

    static function insertNews($title, $description, $content) {
        $visible = true;
        $date = date("Y-m-d-h-i-s");
        $database = DB::getInstance();
        $request = $database->query("INSERT INTO news (visible, date, title, description, content)
                                                VALUES ($visible, '$date', '$title', '$description', '$content');");

        return $request;
    }

    static function deleteNewsById($id) {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM news WHERE id = $id;");
        return $request;
    }

    static function updateNewsById($id, $title, $description, $content) {
        $database = DB::getInstance();
        $request = $database->query("UPDATE news SET content = '$content', title = '$title', description = '$description' 
                                     WHERE id = $id;");

        return $request;
    }

    static function hideNews($id) {   
        $database = DB::getInstance();
        $status = News::get($id)->visible;
        if ($status == 1) {
            $request = $database->query("UPDATE news SET visible = 0 WHERE id = $id;");
        }
        else {
            $request = $database->query("UPDATE news SET visible = 1 WHERE id = $id;");
        }

        return $request;
    }

    static function showNews($id) {
        $database = DB::getInstance();
        $request = $database->query("UPDATE news SET visible = 1 WHERE id = $id;");

        return $request;
    }

    static function getLastNews() {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM news ORDER BY date DESC LIMIT 5");
        $companyNews = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $news) {
            $companyNews[] = new News($news['id'], $news['visible'], $news['date'], $news['title'], $news['description'],
                                $news['content']);
        }
        
        return $companyNews;
    }
}
?>