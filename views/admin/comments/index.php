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
                <a href="#" class="btn btn-primary">Thêm thành viên</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thời gian bình luận</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thành viên sẽ được hiển thị ở đây -->
                        <tr>
                            <th scope="row">1</th>
                            <td>Nguyễn Văn A</td>
                            <td>van.a@example.com</td>
                            <td>2020-05-12</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
</main>
<?php
require_once('views/admin/footer.php'); ?>