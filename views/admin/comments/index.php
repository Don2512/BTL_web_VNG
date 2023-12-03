<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý bình luận đánh giá thành viên</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý bình luận</strong> </h3>
            </div>
            <div class="card-body">
                
                <table class="table">
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
                                <button type=\"button\" class=\"btn btn-warning editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">Sửa</button>
                                <button type=\"button\" class=\"btn btn-danger deletebtn\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
                                    Xoá
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có muốn xoá bình luận này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.deletebtn')on('click',function(){
                    $('#deleteModal').modal('show');

                });

            });
        </script>

</main>
<?php
require_once('views/admin/footer.php'); ?>