<?php
require_once('controllers/base_controller.php');
require_once('models/blogs.php');

class BlogsController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'views/admin/blogs';
    }

    public function index()
    {
        $blogs = Blog::getAllBlogs();
        $blogs = array("blogs" => $blogs);
        $this->render('index', $blogs);
        
    }

    public function add() 
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $author_id = $_POST['author_id'];

        Blog::insertBlog($title, $content, $category, $author_id);

        header('Location: index.php?page=admin&controller=blogs&action=index');
        
    }

    public function edit()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $author_id = $_POST['category'];
        Blog::updateBlogById($id, $title, $content, $category, $author_id);

        header('Location: index.php?page=admin&controller=blogs&action=index');
    }

    public function delete() 
    {
        $id = $_POST['id'];
        Blog::deleteBlogById($id);

        header('Location: index.php?page=admin&controller=blogs&action=index');
    }

    public function hide() 
    {
        $id = $_POST['id'];
        echo $id == NULL;
        Blog::hideBlogById($id);

        header('Location: index.php?page=admin&controller=blogs&action=index');
    }

    public function show()
    {
        $id = $_POST['id'];
        Blog::showBlogById($id);

        header('Location: index.php?page=admin&controller=blogs&action=index');
    }
}