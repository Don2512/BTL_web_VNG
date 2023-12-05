<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/products/vng/skin-2021/dist/main/images/header-slide/header6.jpg" class="d-block w-100" alt="...">
            <div class="position-absolute text-white t-60 l-0 p-5 rounded-4">
                <div class="fs-100px fw-bold">TRÁCH NHIỆM CỘNG ĐỒNG</div>
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
require_once('views/main/blog/news.php')
?>

<?php require_once("views/main/footer.php") ?>