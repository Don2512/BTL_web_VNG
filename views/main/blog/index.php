<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/upload/vng/source/Banner/header3.jpg" class="d-block w-100" alt="...">
            <div class="position-absolute bg-white-50 t-20 l-20 p-5 rounded-4">
                <h5 class="text-black fs-46px">Tin nổi bật</h5>
                <div class="row">
                    <div class="col-auto">
                        <p class="text-black fs-30px d-inline">VNG trở thành nơi làm việt tốt<br>nhất Việt Nam 2023</p>
                    </div>
                    <div class="col-auto"><a href="#" class="text-decoration-none" target="_blank"><i class="bi bi-arrow-right-circle-fill c-orange fs-46px"></i></a></div>
                </div>
            </div>
            <div class="position-absolute text-white t-70 l-20 p-5 rounded-4">
                <div class="fs-100px fw-bold">TIN TỨC</div>
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

<?php
$numOfNews = 9;
require_once("views/main/blog/news.php")
?>

<div class="container mwidth-1200 my-5">
    <h4 class="c-orange fs-30px">Thư viện hình ảnh</h4>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange hover-c-white h-100">LOGO</div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange hover-c-white">VĂN PHÒNG</div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange hover-c-white">GIẢI THƯỞNG</div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="container text-center fs-1 fw-bold py-5 border-c-orange rounded-5 hover-bg-orange hover-c-white">HOẠT ĐỘNG</div>
            </div>
        </div>
    </div>
</div>



<?php require_once("views/main/footer.php") ?>