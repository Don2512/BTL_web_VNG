<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>



<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-7 col-md-9 col-12">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mt-5 fs-12px">
                <li class="breadcrumb-item"><a href="index.php" class="c-orange">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="index.php?page=main&controller=product&action=index" class="c-orange">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán và Tài chính</li>
            </ol>
        </nav>

        <h2 class="c-orange fs-30px fw-bold mt-4 mb-4">Thanh toán và Tài chính</h2>
        <p class="mt-4 mb-4">ZaloPay là ứng dụng thanh toán di động với các tính năng độc đáo được xây dựng chuyên biệt nhằm thỏa mãn mọi nhu cầu thanh toán, phục vụ cho mục đích cá nhân và doanh nghiệp. Đến nay, ZaloPay đã hợp tác kết nối với hầu hết các ngân hàng và đối tác lớn trên toàn quốc như Tiki, Lazada, BigC, BAEMIN….</p>
        <p class="mt-4 mb-4">Với ZaloPay, người dùng có thể chuyển tiền, thanh toán hóa đơn, gửi quà, mua sắm trực tuyến thông qua ZaloOA có sẵn ngay trong giao diện Zalo. Được xây dựng dựa trên Zalo - ứng dụng nhắn tin phổ biến nhất tại Việt Nam, ZaloPay hiện nằm trong Top 5 Ví điện tử phổ biến nhất cả nước, đạt chứng nhận Bảo mật thông tin Quốc tế ISO 27001 và vinh danh Giải pháp chuyển đổi số 2021.</p> 
        <div class="row">
            <div class="col-3 col-lg-3">
                <a target="_blank" href="https://drive.google.com/file/d/1KjQMzQ1tqM8d2K9Udz_jZa5phFFdwTBu/view" style="line-height: 50px; width:300px" class="px-3 mt-2 ml-2 c-orange border-c-orange rounded-5 hover-bg-orange  hover-c-white fw-bold text-decoration-none d-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu-fill" viewBox="0 0 16 16">
                    <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                    <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5"/>
                    </svg>    
                    zalopay.vn
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
            <img class="mt-5 mb-2 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/News/update-2023/taichinh/1.jpg">
        </div>

        <div class="col-6">
            <img class="mt-5 mb-2 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/News/update-2023/taichinh/2.jpg">
        </div>

        <div class="col-6">
            <img class="mt-2 mb-5 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/News/update-2023/taichinh/3.jpg">
        </div>

        <div class="col-6">
            <img class="mt-2 mb-5 img-fluid rounded-5 border w-100" src="https://corp.vcdn.vn/products/upload/vng/source/News/update-2023/taichinh/4.jpg">
        </div>
    </div>
</div>


<?php require_once("views/main/footer.php") ?>