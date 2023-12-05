<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="https://corp.vcdn.vn/products/upload/vng/source/Products/BANNER-PRODUCT-3.png" class="d-block w-100" alt="...">
                <div class="position-absolute text-white t-60 l-0 p-5 rounded-4">
                    <div class="fs-100px fw-bold">SẢN PHẨM</div>
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
                <div class="col-lg-6 mt-4 hover-c-white">
                    <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100 valign">
                        <a class="text-decoration-none while hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=game">Trò chơi trực tuyến</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 hover-c-white">
                    <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100 valign">
                        <a class="text-decoration-none while hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=connection">Nền tảng kết nối</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 hover-c-white">
                    <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100 valign">
                        <a class="text-decoration-none while hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=bill">Thanh toán và Tài chính</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 hover-c-white">
                    <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange h-100 valign">
                        <a class="text-decoration-none while hover-c-white" href="http://localhost/index.php?page=main&controller=product&action=digital">Chuyển đổi số</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once("views/main/footer.php") ?>