<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>



<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-7 col-md-9 col-12">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mt-5 fs-12px">
                <li class="breadcrumb-item"><a href="http://localhost/index.php" class="c-orange">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/index.php?page=main&controller=product&action=index" class="c-orange">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trò chơi trực tuyến</li>
            </ol>
        </nav>

        <h2 class="c-orange fs-30px fw-bold mt-4 mb-4">Trò chơi trực tuyến</h2>
        <p class="mt-4 mb-4">Là một trong bốn mảng kinh doanh chủ lực của VNG, VNGGames được công nhận là một trong những nhà phát hành game hàng đầu tại Việt Nam. Với 17 năm kinh nghiệm phát hành không chỉ tại Việt Nam mà còn ở các thị trường nước ngoài như Đông Nam Á, Nam Mỹ & Mỹ Latin, VNGGames đang từng bước khẳng định vị thế và đón nhận thách thức vươn tầm ra thế giới, bắt đầu từ các quốc gia Đông Nam Á.</p>
        <p class="mt-4 mb-4">ZingPlay là cổng game giải trí đa nền tảng đầu tiên tại Việt Nam, tập hợp các các game tự phát triển bởi đội ngũ kĩ sư VNG để phục vụ khách hàng trên nhiều thị trường khắp thế giới.</p>
        <div class="row">
            <div class="col-3 col-lg-3">
                <a target="_blank" href="https://drive.google.com/file/d/1KjQMzQ1tqM8d2K9Udz_jZa5phFFdwTBu/view" style="line-height: 50px; width:300px" class="px-3 mt-5 ml-5 c-orange border-c-orange rounded-5 hover-bg-orange  hover-c-white fw-bold text-decoration-none d-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu-fill" viewBox="0 0 16 16">
                    <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                    <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5"/>
                    </svg>    
                    vnggames.com
                    <svg id="i-arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M22 6 L30 16 22 26 M30 16 L2 16" />
                    </svg>
                </a>

            </div>
            <div class="col-12 col-lg-3"> </div>
            <div class="col-3 col-lg-3" >
            <a target="_blank" href="https://drive.google.com/file/d/1KjQMzQ1tqM8d2K9Udz_jZa5phFFdwTBu/view" style="line-height: 50px; width:300px" class="px-3 mt-5 ml-5 c-orange border-c-orange rounded-5 hover-bg-orange  hover-c-white fw-bold text-decoration-none d-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu-fill" viewBox="0 0 16 16">
                <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5"/>
                </svg>    
                play.zing.vn
                <svg id="i-arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M22 6 L30 16 22 26 M30 16 L2 16" />
                </svg>
            </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-3"></div>
</div>


<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-12 col-lg-10 row">
        <div class="col-6">
            <img class="mt-5 mb-2 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/Products/Games/PRODUCT%20DETAIL%20IMAGES-01.png">
        </div>

        <div class="col-6">
            <img class="mt-5 mb-2 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/Products/Games/PRODUCT%20DETAIL%20IMAGES-02.png">
        </div>

        <div class="col-6">
            <img class="mt-2 mb-5 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/Products/Games/PRODUCT%20DETAIL%20IMAGES-03.png">
        </div>

        <div class="col-6">
            <img class="mt-2 mb-5 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/Products/Games/PRODUCT%20DETAIL%20IMAGES-04.png">
        </div>
    </div>
</div>


<?php require_once("views/main/footer.php") ?>