<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/products/vng/skin-2021/dist/main/images/header-slide/header6.jpg" class="d-block w-100" alt="...">
            <div class="position-absolute bg-white-75 text-white t-60 l-20 p-5 p-2 rounded-4" id="ctn">
                <div class=" c-black fw-bold fs-1 fs-1" id="t0">TRÁCH NHIỆM CỘNG ĐỒNG</div>
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
<script>
    $(document).ready(function() {
        fixUIBaseOnWidth1();
    });

    window.onresize = fixUIBaseOnWidth1;

    function fixUIBaseOnWidth1() {
        fixUIBaseOnWidth();
        width = window.innerWidth;
        var t0 = $("#t0")
        var ctn = $("#ctn")
        if (width < 1200) {
            ctn.removeClass("t-60 l-20 p-5")
            ctn.addClass("t-10")

        } else {
            ctn.addClass("t-60 l-20 p-5")
            ctn.removeClass("t-10")

        }
    }
</script>
<?php
$numOfNews = 9;
require_once('views/main/blog/news.php')
?>

<?php require_once("views/main/footer.php") ?>