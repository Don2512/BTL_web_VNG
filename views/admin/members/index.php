<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý thành viên</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý thành viên</strong> </h3>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertMemberModal">
                Thêm thành viên
            </button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tuổi</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Chi nhánh</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thành viên sẽ được hiển thị ở đây -->
                        <?php 
                            foreach ($members as $member) {
                                $counter = 1;
                                echo
                            "
                            <tr>
                                <th scope=\"row\">". $member->employee_id ."</th>
                                <td>". $member->employee_name."</td>
                                <td>". $member->age."</td>
                                <td>". $member->position."</td>
                                <td>". $member->phone."</td>
                                <td>". $member->description."</td>
                                <td>". $member->department."</td>
                                <td>". $member->gender."</td>
                                <td>". $member->branch."</td>
                                <td>
                                    <button class=\"btn btn-warning btn-sm\">Sửa</button>
                                    <button type=\"button\" class=\"btn btn-danger deletebtn\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\" data-article-id=\"{$member->employee_id}\">
                                    Xoá
                                    </button>

                                </td>
                            </tr>
                            ";

                                $counter = $counter + 1;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Insert Modal -->
        <div class="modal fade" id="insertMemberModal" tabindex="-1" aria-labelledby="insertMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="insertMemberModalLabel">Thêm thành viên</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="index.php?page=admin&controller=members&action=add" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Tuổi</label>
                        <input type="number" class="form-control" name="age" id="age" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="number" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Phòng ban</label>
                        <input type="text" class="form-control" name="department" id="department" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Giới tính</label>
                        <input type="text" class="form-control" name="gender" id="gender" required>
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="form-label">Chi nhánh</label>
                        <input type="number" class="form-control" name="branch" id="branch" required>
                    </div>
                    <button type="reset" class="btn btn-secondary">Xoá tất cả</button>
                    <button type="submit" name="addMember" class="btn btn-primary">Lưu thay đổi</button>
                    
                    </div>
                </form>
                </div>
            </div>
        </div>
<!-- delete modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Xác nhận</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php?page=admin&controller=members&action=delete" method="post">
                    <div class="modal-body">
                        Bạn có muốn xoá bình luận có ID này?
                        <br>
                        <span id="articleIdToDelete"></span>
                        <!-- Thêm trường input ẩn để chứa comment_id -->
                        <input type="hidden" name="employee_id" id="commentIdToDelete">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
        $('#articleIdToDelete').text(articleId);
        $('#commentIdToDelete').val(articleId);
    });
    $('.editbtn').on('click', function() {
        var content = $(this).data('comment-content');
        var commentId = $(this).data('article-id');

        // Cập nhật giá trị content và comment_id trong textarea và trường ẩn
        $('#contentToEditTextarea').val(content);
        $('#commentIdToEdit').val(commentId);
    });
</script>