<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/upload/vng/source/Banner/BANNER-01.png" class="d-block w-100" alt="...">

            <div class="position-absolute bg-white-75 top-20 left-20 top-10 left-10 p-5 rounded-4" id="ctn">
                <h5 class="text-black fs-1 fs-6" id="text_0">VNG CORPORATION</h5>
                <div class="row">
                    <div class="col-auto">
                        <p class="text-black fs-3 fs-6 d-inline" id="text_1">Technology champion of Vietnam</p>
                    </div>
                    <div class="col-auto"><a href="?page=main&controller=about&action=index" class="text-decoration-none" target="_blank"><i class="bi bi-arrow-right-circle-fill c-orange fs-1 fs-5"></i></a></div>
                </div>
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
<div class="container mwidth-1200 mt-5">
    <h4 class="c-orange mwidth-1200 fs-30px mb-4">Sứ mệnh</h4>
    <h3 class="fs-36px">Kiến tạo công nghệ và phát triển con người.<br>Từ Việt Nam vươn tầm thế giới.</h3>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 col-sm-12 mb-3">
                <a class="text-decoration-none c-orange hover-c-white" href="?page=main&controller=product&action=index">
                    <div class="container border-c-orange border-2 rounded-4 text-center py-5 hover-bg-orange h-100">
                        <div class="fs-24px fw-bold">Sản phẩm</div>
                        <div class="fs-50px"><i class="bi bi-box-seam"></i></div>
                        <div class="fs-16px">Tìm hiểu các sản phẩm<br>chính của VNG</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-12 mb-3">
                <a class="text-decoration-none c-orange hover-c-white" href="?page=main&controller=human&action=index">
                    <div class="container border-c-orange border-2 rounded-4 text-center py-5 hover-bg-orange h-100">
                        <div class="fs-24px fw-bold">Con người</div>
                        <div class="fs-50px"><i class="bi bi-people"></i></div>
                        <div class="fs-16px">Làm quen với con người và<br>văn hóa tại VNG</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-12 mb-3">
                <a class="text-decoration-none c-orange hover-c-white" href="?page=main&controller=society&action=index">
                    <div class="container border-c-orange border-2 rounded-4 text-center py-5 hover-bg-orange h-100">
                        <div class="fs-24px fw-bold">Trách nhiệm cộng đồng</div>
                        <div class="fs-50px"><i class="bi bi-bar-chart-line"></i></div>
                        <div class="fs-16px">Khám phá cảm hứng của VNG trong<br>đóng góp xã hội</div>
                    </div>
                </a>
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
        if (width < 1200) {
            ctn.removeClass("t-20 l-20 p-5")
            ctn.addClass("t-10 l-10 p-3")
        } else {
            ctn.addClass("t-20 l-20 p-5")
            ctn.removeClass("t-10 l-10 p-3")
        }
    }
</script>

<?php
require_once("views/main/blog/news.php");
require_once("views/main/footer.php");
?>