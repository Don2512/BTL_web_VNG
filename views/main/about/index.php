<!DOCTYPE html>
<html lang="en">

<?php
require_once("views/main/header.php") ?>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img src="https://corp.vcdn.vn/upload/vng/source/Banner/ABOUT%20BANNER%20220209-02.png" class="d-block w-100" alt="...">

            <div class="position-absolute t-20 l-20 p-5 rounded-4" id="ctn">
                <div class="c-orange fs-2" id="text_0">Sứ mệnh</div>
                <div class="fs-1 fw-bold text-white" id="text_1">Kiến tạo công nghệ<br>và phát triển con người<br>Từ Việt Nam vươn tầm thế giới</div>
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
    <h4 class="c-orange mwidth-1200 fs-30px mb-4">Giá trị cốt lõi</h4>
    <h3 class="fs-36px">Con người và văn hóa là tài sản quan trọng của VNG</h3>
    <div class="fs-16px">Được định hướng bởi 03 giá trị cốt lõi, chúng tôi nỗ lực vì sự phát triển của cả công ty và cộng đồng.</div>
    <div class="container mt-4">
        <div class="row">
            <div class="col c-orange pb-50px hover-bg-orange hover-c-white active px-0" style="padding-left:0" onclick=toggleActive(0) id="btn_0">
                <div class="container border-c-orange text-center py-5 h-100 hover-pb-50px">
                    <div class="fs-4 fw-bold">ĐÓN NHẬN THÁCH THỨC</div>
                </div>
            </div>
            <div class="col mx-1 c-orange pb-50px hover-bg-orange hover-c-white px-0" onclick=toggleActive(1) id="btn_1">
                <div class="container border-c-orange text-center py-5 h-100">
                    <div class="fs-4 fw-bold valign">PHÁT TRIỂN ĐỐI TÁC</div>
                </div>
            </div>
            <div class="col c-orange pb-50px hover-bg-orange hover-c-white px-0" style="padding-right:0" onclick=toggleActive(2) id="btn_2">
                <div class="container border-c-orange text-center py-5 h-100">
                    <div class="fs-4 fw-bold valign">GIỮ GÌN CHÍNH TRỰC</div>
                </div>
            </div>
        </div>
        <div class="row border-c-orange py-5">
            <div class="col-12 px-5" id="contentBox">
            </div>
        </div>
    </div>
</div>
<div class="container mwidth-1200 my-5">
    <h4 class="c-orange fs-30px mb-4">Cột mốc chính</h4>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-2 col-sm-12 mb-3">
                <img class="w-100 rounded-4" data-src="//corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-05.png" alt="" src="//corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-05.png">
            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="container">
                    <h6 class="c-orange">2017 - Nay</h6>
                    <h3>Từ Việt Nam vươn tầm thế giới</h3>
                    <p class=""><span class="fw-bold">2022:</span><br>- <span>Vinh dự đón nhận danh hiệu Great Place To Work</span><br>- Khánh thành VNG Data Center tại Tp. HCM, đạt chứng chỉ Uptime Tier III<br><span class="fw-bold">2021:</span><br>- PUBG Mobile VN, Liên minh Huyền thoại: Tốc chiến và Mobile Legends: Bang Bang do VNG phát hành được lựa chọn thi đấu chính thức tại SEA Games 31 ở nội dung Thể thao điện tử<br><strong>2020:</strong><br>- Ra mắt trueID, giải pháp định danh khách hàng điện tử do kỹ sư Việt phát triển<br><span class="fw-bold">2019:</span><br>- Chính thức khai trương trụ sở chính VNG Campus, TP.HCM<br>- Đặt khát vọng mới - “2332” với sứ mệnh “Kiến tạo công nghệ và phát triển con người. Từ Việt Nam vươn tầm thế giới” và 3 giá trị cốt lõi: Đón nhận Thách thức, Phát triển đối tác, và Gìn giữ chính trực<br><span class="fw-bold">2018:</span><br>- Khai trương văn phòng mới tại Thái Lan và Myanmar<br>- Đổi tên VinaData thành VNG Cloud<br>- Ra mắt UpRace, dự án chạy bộ cộng đồng lớn nhất Việt Nam<br>- Ra mắt trợ lý ảo đầu tiên của Zalo mang tên Ki-Ki<br><strong><span class="fw-bold">2017:</span></strong><br>- Ra mắt Ví điện tử ZaloPay</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-2 col-sm-12 mb-3">
                <img class="w-100 rounded-4" data-src="//corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-04.png" alt="" src="//corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-04.png">
            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="container">
                    <h6 class="c-orange">2013 - 2016</h6>
                    <h3>Kỳ lân công nghệ đầu tiên của Việt Nam</h3>
                    <p class=""><span class="fw-bold">2015:</span><br>- Trở thành nhà tài trợ chiến lược của giải VNG IRONMAN 70.3 lần đầu tiên tổ chức tại Việt Nam, khởi động phong trào ba môn phối hợp (triathlon) tại Việt Nam<br><span class="fw-bold">2014:</span><br>- VNG được định giá 1 tỷ USD theo World Start-up Report, trở thành kỳ lân đầu tiên tại Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-2 col-sm-12 mb-3">
                <img class="w-100 rounded-4" data-src="https://corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-03.png" alt="" src="https://corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-03.png">
            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="container">
                    <h6 class="c-orange">2009 - 2012</h6>
                    <h3>Hướng đến những tiêu chuẩn toàn cầu</h3>
                    <p class=""><span class="fw-bold">2012:</span><br>- Tiếp cận thị trường Trung Quốc, xuất khẩu thành công trò chơi Sky Garden<br>- Ra mắt Zalo, ứng dụng nhắn tin và gọi điện miễn phí hoạt động trên nền tảng di động<br><span class="fw-bold">2011:</span><br>- Tiếp cận thị trường Nhật Bản, xuất khẩu thành công trò chơi Ủn Ỉn<br><span class="fw-bold">2010:</span><br>- Chính thức đổi tên thương hiệu thành VNG<br>- Ra mắt (open beta) game dã sử Thuận Thiên Kiếm, game MMO mang thương hiệu Việt đầu tiên tại Đông Nam Á<br><span class="fw-bold">2009:</span><br>- Ra mắt ZingPlay.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-2 col-sm-12 mb-3">
                <img class="w-100 rounded-4" data-src="//corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-02.png" alt="" src="//corp.vcdn.vn/upload/vng/source/Milestone/MILESTONE-02.png">
            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="container">
                    <h6 class="c-orange">2004 - 2008</h6>
                    <h3>Dẫn đầu thị trường dịch vụ internet</h3>
                    <p class=""><span class="fw-bold">2007:</span><br>- Khánh thành trung tâm dữ liệu hiện đại nhất Việt Nam, VINADATA, nhằm giám sát việc sử dụng và lưu trữ dữ liệu của tất cả các sản phẩm trong toàn công ty<br>- Ra mắt Zing MP3, sản phẩm đầu tiên mang thương hiệu Zing, bắt đầu mảng kinh doanh web<br><span class="fw-bold">2005:</span><br>- Phát hành game online đầu tiên - Võ Lâm Truyền Kỳ (Series Sword Heroes Fate của Kingsoft) với thành công đột phá 300.000 PCU sau 1 tháng<br>- Trở thành công ty đầu tiên đàm phán thành công với đối tác quốc tế và phân phối game bản quyền tại Việt Nam<br><span class="fw-bold">2004</span><br>- Thành lập tại một quán cà phê Internet bởi 5 chàng trai trẻ, tiên phong cho kỷ nguyên game nhập vai tại Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mwidth-1200 my-5">
    <h4 class="c-orange fs-30px mb-4">Ban lãnh đạo cấp cao</h4>
    <div class="row">
        <div class="col-lg-4 col-sm-12 mt-4">
            <div class="card hover-shadow rounded-5 h-100">
                <img src="//corp.vcdn.vn/products/upload/vng/source/SMT/380x330/A-Minh-2.jpg" class="card-img-top h-100 w-100 rounded-top-5" alt="...">
                <div class="card-body h-100 p-4 text-center">
                    <h4 class="c-orange">Lê Hồng Minh - CEO &amp; Founder của VNG Corporation </h4>
                    <p class="c-gray">Founder &amp; CEO of VNG </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-4">
            <div class="card hover-shadow rounded-5 h-100">
                <img src="//corp.vcdn.vn/products/upload/vng/source/SMT/380x330/A-Khai-2-1.jpg" class="card-img-top h-100 w-100 rounded-top-5" alt="...">
                <div class="card-body h-100 p-4 text-center">
                    <h4 class="c-orange">Vương Quang Khải </h4>
                    <p class="c-gray">Co-founder, Executive Vice President of VNG </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-4">
            <div class="card hover-shadow rounded-5 h-100">
                <img src="//corp.vcdn.vn/products/upload/vng/source/SMT/380x330/A-Thanh-2.jpg" class="card-img-top h-100 w-100 rounded-top-5" alt="...">
                <div class="card-body h-100 p-4 text-center">
                    <h4 class="c-orange">Nguyễn Lê Thành </h4>
                    <p class="c-gray">Chief Technology Officer of VNG </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-4">
            <div class="card hover-shadow rounded-5 h-100">
                <img src="//corp.vcdn.vn/products/upload/vng/source/SMT/380x330/A-Kelly-2.jpg" class="card-img-top h-100 w-100 rounded-top-5" alt="...">
                <div class="card-body h-100 p-4 text-center">
                    <h4 class="c-orange">Kelly Wong </h4>
                    <p class="c-gray">Vice President of Game Entertainment </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-4">
            <div class="card hover-shadow rounded-5 h-100">
                <img src="//corp.vcdn.vn/products/upload/vng/source/SMT/380x330/A-Ray-2.jpg" class="card-img-top h-100 w-100 rounded-top-5" alt="...">
                <div class="card-body h-100 p-4 text-center">
                    <h4 class="c-orange">Raymond Tan </h4>
                    <p class="c-gray">Chief Financial Officer of VNG </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mt-4">
            <div class="card hover-shadow rounded-5 h-100">
                <img src="//corp.vcdn.vn/products/upload/vng/source/SMT/380x330/A-Gary-2.jpg" class="card-img-top h-100 w-100 rounded-top-5" alt="...">
                <div class="card-body h-100 p-4 text-center">
                    <h4 class="c-orange">Gary McKinnon </h4>
                    <p class="c-gray">Senior Director of Business Development, VNG </p>
                </div>
            </div>
        </div>
        <!--  -->

        <!--  -->
    </div>
</div>

<script>
    $(document).ready(function() {
        toggleActive(0);
        fixUIBaseOnWidth1();
    });

    function toggleActive(n) {
        $('.pb-50px').removeClass('active');
        var contentBox = document.getElementById("contentBox");
        var btn
        if (n == 0) {
            btn = document.getElementById("btn_0");
            contentBox.innerText = "Phương châm 'Đón nhận thách thức' đã gắn liền với VNG ngay từ những ngày đầu thành lập. Để biến giấc mơ thành hiện thực, chúng tôi kiên định xây dựng một văn hóa mà ở đó thách thức luôn được đón nhận như những cơ hội để mọi người cùng rèn luyện và phát triển. Chính lòng dũng cảm dám mơ ước những điều vĩ đại đã giúp VNG vượt qua mọi trở ngại và đạt được những thành tựu như ngày hôm nay."
        } else if (n == 1) {
            btn = document.getElementById("btn_1");
            contentBox.innerText = "Đối với VNG, 'Quan hệ đối tác'  không chỉ đơn thuần là quá trình làm việc nhóm và hợp tác song phương trên cơ sở lợi ích, mà còn là quá trình xây dựng các mối quan hệ vững bền trên cơ sở lòng tin. Giá trị cốt lõi này được áp dụng cho toàn bộ các quan hệ hợp tác của VNG, xuyên suốt từ nội bộ đến bên ngoài.";
        } else {
            btn = document.getElementById("btn_2");
            contentBox.innerText = "Chính trực là lời hứa mà VNG cam kết thực hiện với khách hàng, đối tác kinh doanh, và toàn thể thành viên của mình. Tại VNG, chúng tôi nỗ lực xây dựng một tổ chức nơi mọi người có thể tin tưởng lẫn nhau và hành động dựa trên nền tảng là sự trung thực và lòng tin. Chúng tôi muốn đảm bảo rằng các thành viên của mình có thể tự hào là một phần của công ty và là một phần của tập thể nơi mọi người đều được tôn trọng vì tính chính trực, trung thực, và các giá trị cá nhân của mỗi người."
        }
        $(btn).addClass('active');
    }

    window.onresize = fixUIBaseOnWidth1;

    function fixUIBaseOnWidth1() {
        fixUIBaseOnWidth();
        width = window.innerWidth;
        var text_0 = $("#text_0")
        var text_1 = $("#text_1")
        var ctn = $("#ctn")
        var text_2 = $(".fs-4.fw-bold")
        if (width < 1200) {
            text_0.removeClass("fs-2")
            text_0.addClass("fs-5")
            text_1.removeClass("fs-1")
            text_1.addClass("fs-4")
            ctn.removeClass("t-20 l-20 p-5")
            ctn.addClass("t-10 l-10 p-1")
            text_2.addClass("fs-6")
        } else {
            text_0.removeClass("fs-5")
            text_0.addClass("fs-2")
            text_1.removeClass("fs-4")
            text_1.addClass("fs-1")
            ctn.addClass("t-20 l-20 p-5")
            ctn.removeClass("t-10 l-10 p-1")
        }
    }
</script>

<?php require_once("views/main/footer.php") ?>