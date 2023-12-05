<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/upload/vng/source/Banner/header3.jpg" class="d-block w-100" alt="...">
            <div class="position-absolute bg-white-50 t-20 l-20 p-5 rounded-4" id="ctn">
                <h5 class="text-black fs-46px" id="text_0">Tin nổi bật</h5>
                <div class="row">
                    <div class="col-auto">
                        <p class="text-black fs-30px d-inline" id="text_1">VNG trở thành nơi làm việt tốt<br>nhất Việt Nam 2023</p>
                    </div>
                    <!-- <div class="col-auto"><a href="#" class="text-decoration-none" target="_blank"><i class="bi bi-arrow-right-circle-fill c-orange fs-46px"></i></a></div> -->
                </div>
            </div>
            <div class="position-absolute text-white t-70 l-20 p-5 rounded-4" id="ctn2">
                <div class="fs-100px fw-bold" id="text_2">TIN TỨC</div>
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
// $numOfNews = 9;
$mainPage = true;
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

<script>
    $(document).ready(function() {
        fixUIBaseOnWidth1();
    });

    window.onresize = fixUIBaseOnWidth1;

    function fixUIBaseOnWidth1() {
        fixUIBaseOnWidth();
        width = window.innerWidth;
        var text_0 = $("#text_0")
        var text_1 = $("#text_1")
        var ctn = $("#ctn")
        var ctn2 = $("#ctn2")
        var text_2 = $("#text_2")
        if (width < 1200) {
            text_0.removeClass("fs-46px")
            text_0.addClass("fs-4")
            text_1.removeClass("fs-30px")
            text_1.addClass("fs-6")
            ctn.removeClass("t-20 l-20 p-5")
            ctn.addClass("t-10 l-10 p-1")
            ctn2.removeClass("t-70 l-20 p-5")
            ctn2.addClass("t-60 l-10 p-1")
            text_2.addClass("fs-5")
        } else {
            text_0.removeClass("fs-4")
            text_0.addClass("fs-46px")
            text_1.removeClass("fs-6")
            text_1.addClass("fs-30px")
            ctn.addClass("t-20 l-20 p-5")
            ctn.removeClass("t-10 l-10 p-1")
            ctn2.addClass("t-70 l-20 p-5")
            ctn2.removeClass("t-60 l-10 p-1")
            text_2.removeClass("fs-5")
        }
    }
</script>

<?php require_once("views/main/footer.php") ?>