<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <br>
        <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px; color: #E65A26;">
            <h1 class="mb-0 fw-semibold">Chào mừng bạn đến trang của quản trị viên</h1>
        </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
        <div class="card">
            <a href="index.php?page=admin&controller=members&action=index" style="text-decoration: none;" >
            <div class="card-body text-center">
                <h4 class="card-title" >Quản lý thành viên</h4>
                <p> <i class="fa-solid fa-users" style="font-size:48px;"></i></p>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <a href="index.php?page=admin&controller=comments&action=index">
            <div class="card-body text-center">
                <h4 class="card-title">Quản lý bình luận đánh giá thành viên</h4>
                <p> <i class="fa-regular fa-comments" style="font-size:48px;"></i></p>
            </div>
            </a> 
        </div>
    </div>
    <div class="col">
        <div class="card">
            <a href="index.php?page=admin&controller=articles&action=index">
            <div class="card-body text-center">
                <h4 class="card-title">Quản lý tin tức</h4>
                <p> <i class="fa-regular fa-newspaper" style="font-size:48px;"></i></p>
                
            </div>
            </a>
            
        </div>
    </div>
    <div class="col">
        <div class="card">
            <a href="index.php?page=admin&controller=products&action=index">
            <div class="card-body text-center">
                <h4 class="card-title">Quản lý sản phẩm</h4>
                <p> <i class="fa-solid fa-lines-leaning" style="font-size:48px;"></i></p>
                
            </div>
            </a>
            
        </div>
    </div>
    </div>
</main>
<?php
require_once('views/admin/footer.php'); ?>