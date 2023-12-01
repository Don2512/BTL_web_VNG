<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2">
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
                <a href="#" class="btn btn-primary">Thêm thành viên</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thành viên sẽ được hiển thị ở đây -->
                        <tr>
                            <th scope="row">1</th>
                            <td>Nguyễn Văn A</td>
                            <td>van.a@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Trần Thị B</td>
                            <td>thi.b@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Nguyễn Thị C</td>
                            <td>thi.b@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Trần Thị D</td>
                            <td>thi.b@example.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Sửa</button>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Trần Thị E</td>
                            <td>thi.b@example.com</td>
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