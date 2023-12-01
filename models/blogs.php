<?php
require_once('connection.php');
class Blog
{
    public $id;
    public $title;
    public $content;
    public $category;
    public $time_published;
    public $visible;
    public $author_id;

    public function __construct($id, $title, $content, $category, $time_published, $visible, $author_id) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->time_published = $time_published;
        $this->category = $category;
        $this->visible = $visible;
        $this->author_id = $author_id;
    }

    static function getAllBlogs() {
        $database = DB::getInstance();
        $request = $database->query(
            "SELECT blog_id, title, content, time_published, category, visible, employee_name
             FROM Employee, Blog
             WHERE author_id = employee_id
             ORDER BY time_published DESC;
            ");
        $companyBlog = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $Blog) {
            $companyBlog[] = new Blog(
                                $Blog['blog_id'], 
                                $Blog['title'], 
                                $Blog['content'], 
                                $Blog['category'],
                                $Blog['time_published'], 
                                $Blog['visible'],
                                $Blog['employee_name']);
        }

        return $companyBlog;
    }

    static function getAllVisibleBlog() {
        $database = DB::getInstance();
        $request = $database->query(
            "SELECT blog_id, title, content, time_published, category, visible, employee_name
            FROM Employee, Blog
            WHERE author_id = employee_id AND visible = 1
            ORDER BY time_published DESC;
        ");
        $companyBlog = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $Blog) {
            $companyBlog[] = new Blog(
                                $Blog['blog_id'], 
                                $Blog['title'], 
                                $Blog['content'], 
                                $Blog['category'],
                                $Blog['time_published'], 
                                $Blog['visible'],
                                $Blog['author_id']);
        }

        return $companyBlog;
    }

    static function getBlogById($id) {
        $database = DB::getInstance();
        $request = $database->query(
            "SELECT blog_id, title, content, time_published, category, visible, employee_name
             FROM Blog, Employee 
             WHERE blog_id = $id AND employee_id = author_id
             ORDER BY time_published DESC;
        ");
        $companyBlog = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $Blog) {
            $companyBlog[] = new Blog(
                                $Blog['blog_id'], 
                                $Blog['title'], 
                                $Blog['content'], 
                                $Blog['category'],
                                $Blog['time_published'], 
                                $Blog['visible'],
                                $Blog['author_id']);
        }

        return $companyBlog;
    }

    static function insertBlog($title, $content, $category, $author_id) {
        $visible = true;
        $time_published= date("Y-m-d-h-i-s");
        $database = DB::getInstance();
        $request = $database->query
        (
            "INSERT INTO Blog (title, content, time_published, category, visible, author_id)
                VALUE ('$title', '$content', '$time_published', '$category', '$visible', '$author_id');"
                        
        );

        return $request;
    }

    static function deleteBlogById($id) {
        $database = DB::getInstance();
        $request = $database->query("DELETE FROM Blog WHERE id = $id;");
        return $request;
    }

    static function updateBlogById($id, $title, $content, $category, $author_id) {
        $time_published= date("Y-m-d-h-i-s");
        $database = DB::getInstance();
        $request = $database->query
        (
            "UPDATE Blog 
            SET
                title = '$title', 
                content = '$content', 
                category = '$category', 
                author_id = '$author_id',
                time_published = '$time_published' 
            WHERE id = $id;"
        );

        return $request;
    }

    static function hideBlogById($id) {   
        $database = DB::getInstance();
        $status = Blog::getBlogById($id)[0]->visible;
        if ($status == 1) {
            $request = $database->query("UPDATE Blog SET visible = 0 WHERE id = $id;");
        }
        else {
            $request = $database->query("UPDATE Blog SET visible = 1 WHERE id = $id;");
        }

        return $request;
    }

    static function showBlogById($id) {
        $database = DB::getInstance();
        $request = $database->query("UPDATE Blog SET visible = 1 WHERE id = $id;");

        return $request;
    }

    static function getLastBlog() {
        $database = DB::getInstance();
        $request = $database->query("SELECT * FROM Blog ORDER BY time_published DESC LIMIT 5");
        $companyBlog = [];
        foreach ($request->fetch_all(MYSQLI_ASSOC) as $Blog) {
            $companyBlog[] = new Blog(
                $Blog['blog_id'], 
                $Blog['title'], 
                $Blog['content'], 
                $Blog['category'],
                $Blog['time_published'], 
                $Blog['visible'],
                $Blog['author_id']);
        }
        
        return $companyBlog;
    }
}
?>