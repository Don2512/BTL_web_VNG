<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý bình luận đánh giá thành viên</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý bình luận</strong> </h3>
            </div>
            <div class="card-body">
                
                <table id="comment-table" class="table table-hover nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">ID bài viết</th>
                            <th scope="col">Bài viết</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thời gian bình luận</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu sẽ được hiển thị ở đây -->
                        <?php 
                            foreach ($comments as $comment) {
                                $counter = 1;
                                
                                echo "<tr>";
                                echo "<td>". $comment->employee_name."</td>";
                                echo "<td>". $comment->article_id ."</td>";
                                echo "<td>". $comment->article_title ."</th>";
                                echo "<td>". $comment->content."</td>";
                                echo "<td>". $comment->time_commented."</td>";
                                echo "<td>
                                <button type=\"button\" class=\"btn btn-warning editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editModal\" data-article-id=\"{$comment->article_id}\" data-comment-content=\"{$comment->content}\"  data-article_title=\"{$comment->article_title}\" data-employee_name=\"{$comment->employee_name}\"><i class=\"fa-solid fa-pen-to-square\"></i></button>
                                <button type=\"button\" class=\"btn btn-danger deletebtn\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\" data-article-id=\"{$comment->article_id}\" data-employee-id=\"{$comment->employee_id}\">
                                <i class=\"fa-solid fa-trash\"></i>
                                    </button>

                                </td>";
                                echo "</tr>";

                                $counter = $counter + 1;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
       
        <!-- edit modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h1 class="modal-title fs-5" id="editModalLabel">Chỉnh sửa bình luận</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=admin&controller=comments&action=edit" method="post">
                        <div class="modal-body">
                            <fieldset disabled>
                                <div class="mb-3">
                                    <label for="article_title" class="form-label">Bài viết:</label>
                                    <input type="text" id="article_title" class="form-control" placeholder="Disabled input">
                                </div>
                                <div class="mb-3">
                                    <label for="article_title" class="form-label">Nhân viên:</label>
                                    <input type="text" id="employee_name" class="form-control" placeholder="Disabled input">
                                </div>
                            </fieldset>
                            <div class="mb-3">
                                <label for="content" class="form-label">Bình luận:</label>
                                <!-- Sử dụng textarea để hiển thị nội dung hiện tại và cho phép chỉnh sửa -->
                                <textarea class="form-control" name="content" id="contentToEditTextarea" rows="4" required></textarea>
                            </div>
                            <!-- Thêm một trường ẩn để chứa comment_id -->
                            <input type="hidden" name="article_id" id="commentIdToEdit">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- delete modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Xác nhận</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=admin&controller=comments&action=delete" method="post">
                        <div class="modal-body">
                            Bạn có muốn xoá bình luận này?
                            <input type="hidden" name="article_id" id="commentIdToDelete">
                            <input type="hidden" name="employee_id" id="employee_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger">Xoá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
<?php
require_once('views/admin/footer.php'); ?>
<script>
    // Thêm mã JavaScript để cập nhật giá trị article_id trong modal delete
    $('.deletebtn').on('click', function() {
        var articleId = $(this).data('article-id');
        var employeeId = $(this).data('employee-id');
        $('#articleIdToDelete').text(articleId);
        $('#commentIdToDelete').val(articleId);
        $('#employee_id').val(employeeId);
    });
    $('.editbtn').on('click', function() {
        var content = $(this).data('comment-content');
        var commentId = $(this).data('article-id');
        var employee_name= $(this).data('employee_name');
        var article_title= $(this).data('article_title');

        // Cập nhật giá trị content và comment_id trong textarea và trường ẩn
        $('#contentToEditTextarea').val(content);
        $('#commentIdToEdit').val(commentId);
        $('#employee_name').val(employee_name);
        $('#article_title').val(article_title);
    });
</script>
<script>
    // Use DataTables to implement simple sort, search
    $(document).ready(function() {
        /* $('#fullpage').fullpage(); */
        $('#comment-table').DataTable( {
            "scrollX": true
            }
        );
    });
</script>