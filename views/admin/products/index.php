<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý sản phẩm</strong> </h3>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    Thêm sản phẩm
                </button>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tiểu đề</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Thời gian đăng bài</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
require_once('views/admin/footer.php'); ?>