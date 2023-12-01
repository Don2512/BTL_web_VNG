<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý bài viết</strong> </h3>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">Thêm bài viết</button>
                <!-- Modal -->
                <div class="modal fade" id="addBlogModal" tabindex="-1" role="dialog" aria-labelledby="addBlogModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addBlogModalLabel">Thêm bài viết</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="form-add-blog" action="index.php?page=admin&controller=blogs&action=add" enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                                <div class="form-group"> 
                                    <label>Tiêu đề</label> 
                                    <textarea class="form-control" placeholder="Tiêu đề" name="title" rows="5"></textarea>
                                </div>
                                <div class="form-group"> 
                                    <label>Nội dung</label> 
                                    <textarea class="form-control" placeholder="Nội dung" name="content" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <input class="form-control" type="text" placeholder="Thể loại" name="category">
                                </div>
                                <div class="form-group">
                                    <label>Mã tác giả</label>
                                    <input class="form-control" type="number" placeholder="Tác giả" name="author-id">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

<?php 
foreach ($blogs as $blog) {
    $visible = ($blog->visible) ? 1 : 0;
    $visible_status_button = 
    ($blog->visible) 
        ? "
<form action=\"index.php?page=admin&controller=blogs&action=hide\" method=\"post\">
    <input type=\"checkbox\" class=\"btn-check\" id=\"toggle-visibility-". $blog->id ."\" autocomplete=\"off\">
    <label class=\"btn btn-info\" for=\"toggle-visibility-". $blog->id ."\"><i class=\"fa-solid fa-eye\"></i></label>
</form>
            "
        : "<a href=\"index.php?page=admin&controller=blogs&action=show\" class=\"btn btn-warning\"><i class=\"fa-solid fa-eye-slash\"></i></a>";
    echo
"
<tr>
    <th scope=\"row\">". $blog->id ."</th>
    <td>". $blog->title ."</td>
    <td>". $blog->content ."</td>
    <td>". $blog->category ."</td>
    <td>". $blog->author_id ."</td>
    <td>". $visible_status_button."</td>
    <td>
        <a href=\"index.php?page=admin&controller=blogs&action=edit\" class=\"btn btn-warning btn-sm\"> 
            <i class=\"fa-solid fa-pen\"></i>
        </a>
        <a href=\"index.php?page=admin&controller=blogs&action=delete\" class=\"btn btn-danger btn-sm\">
            <i class=\"fa-solid fa-trash\"></i>
        </a>
    </td>
</tr>
";
}

                        ?>
                    </tbody>

                </table>
            </div>
        </div>
</main>
<?php
require_once('views/admin/footer.php'); ?>