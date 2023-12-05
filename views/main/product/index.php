<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="https://corp.vcdn.vn/products/upload/vng/source/Products/BANNER-PRODUCT-3.png" class="d-block w-100" alt="...">
                <div class="position-absolute text-white t-60 l-0 p-5 rounded-4" id="ctn">
                    <div class="fs-100px fw-bold" id="text_0">SẢN PHẨM</div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container mwidth-1200 my-5">
        <h4 class="c-orange fs-30px fw-bold">Kết nối người dùng và hỗ trợ doanh nghiệp</h4>
        <p class="fw-bold">Ứng dụng công nghệ vào cuộc sống và nâng cấp doanh nghiệp trên nền tảng số</p>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-4">
                    <a class="text-decoration-none while c-black hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=game">
                        <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100 hover-c-white c-black">
                            <div class="valign">Trò chơi trực tuyến</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mt-4">
                    <a class="text-decoration-none while c-black hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=connection">
                        <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100">
                            <div class="valign">Nền tảng kết nối</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mt-4">
                    <a class="text-decoration-none while c-black hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=bill">

                        <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100">
                            <div class="valign">Thanh toán và Tài chính</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mt-4">
                    <a class="text-decoration-none while c-black hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=digital">
                        <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100">
                            <div class="valign">Chuyển đổi số</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        fixUIBaseOnWidth1();
    });

    window.onresize = fixUIBaseOnWidth1;

    function fixUIBaseOnWidth1() {
        fixUIBaseOnWidth();
        width = window.innerWidth;
        var text_0 = $("#text_0")
        var ctn = $("#ctn")
        if (width < 1200) {
            text_0.removeClass("fs-100px")
            text_0.addClass("fs-1")
            ctn.removeClass("t-60 p-5")
            ctn.addClass("t-10 p-2")
        } else {
            text_0.removeClass("fs-1")
            text_0.addClass("fs-100px")
            ctn.removeClass("t-10 p-2")
            ctn.addClass("t-60 p-5")
        }
    }
</script>
<?php require_once("views/main/footer.php") ?>