<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == "employee") {
    header("Location: ?page=main&controller=login&action=signin");
    exit;
}
$file_name = basename($view_file);
$directory_path = dirname($view_file);
$page = basename($directory_path);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules\bootstrap-icons\font\bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public\css\style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>VNG</title>
</head>

<body>
    <div class="bg-white w-100 position-fixed z-3 border-bottom border-2" id="nav">
        <div class="container mwidth-1200px" id="navCtn">
            <div class="row w-100 py-4" id="navRow">
                <div class="col">
                    <a class="" href="index.php?page=main&controller=layouts&action=index">
                        <img class="valign" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/VNG_Corp._logo.svg/1200px-VNG_Corp._logo.svg.png" style="max-width:60px; max-height:24px" />
                    </a>
                </div>

                <div class="col-auto d-none" id="btn_nav">
                    <div class="rounded-3 bg-white-100 border-c-orange border-3 py-2 px-3 c-orange hover-mouse hover-c-white hover-bg-orange" onclick=toggleNav()><i class="bi bi-three-dots"></i></div>
                </div>

                <div class="col-auto" id="navList">
                    <div class=" w-100">
                        <div class="row w-100">
                            <div class="col"></div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "about") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" href="index.php?page=main&controller=about&action=index">
                                                    Về VNG
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "blog") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" href="index.php?page=main&controller=blog&action=index">Tin tức</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "product") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" href="index.php?page=main&controller=product&action=index">Sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "human") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" href="index.php?page=main&controller=human&action=index">Con người</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "society") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" href="index.php?page=main&controller=society&action=index">Trách nhiệm cộng đồng</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "order") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" href="index.php?page=main&controller=order&action=index">Mua hàng</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- LOGIN -->
                                    <div class="col-lg-auto">
                                        <div class="row">
                                            <div <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "customer") echo 'onclick=account()' ?> id="accCtn" class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "login") echo 'active' ?>">
                                                <a class="text-decoration-none c-black px-2 hover-c-black pb-1" <?php if (!(isset($_SESSION['role']) && $_SESSION['role'] == "customer")) echo 'href="index.php?page=main&controller=login&action=signin"'; ?>>
                                                    <?php
                                                    if (isset($_SESSION['role']) && $_SESSION['role'] == "customer") echo "Tài khoản";
                                                    else echo "Đăng nhập";
                                                    ?>
                                                </a>
                                                <div class='d-none position-absolute top-100 border-c-orange px-2 bg-white border-2' style="width:150px;" id="acc">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="text-decoration-none" href="index.php?page=main&controller=information&action=index">
                                                                <div class="hover-c-orange c-black">
                                                                    Thông tin cá nhân
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="text-decoration-none" href="index.php?page=main&controller=information&action=purchaseHistory">
                                                                <div class="hover-c-orange c-black">
                                                                    Lịch sử mua hàng
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="text-decoration-none" href="index.php?page=main&controller=order&action=myOrder">
                                                                <div class="hover-c-orange c-black">
                                                                    Giỏ hàng
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="text-decoration-none" href="index.php?page=main&controller=login&action=signin">
                                                                <div class="hover-c-orange c-black">
                                                                    Đăng xuất
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="row w-100" id="s2nav">
                <div class="col"></div>
            </div>

        </div>
    </div>
    <div id="navBg" class="bg-white"></div>
</body>
<script src="public/js/bootstrap_js/bootstrap.min.js"></script>
<script>
    function account() {
        var acc = $("#acc")
        var accCtn = $("#accCtn")
        acc.toggleClass("d-none")
        accCtn.removeClass("dotUnder")
    }

    $(document).ready((e) => {
        fixUIBaseOnWidth();
    })
    window.onresize = fixUIBaseOnWidth;

    function fixUIBaseOnWidth() {
        height = window.innerHeight;
        width = window.innerWidth;
        var btn_nav = document.getElementById('btn_nav');
        var navList = document.getElementById('navList')
        if (width < 1200) {
            $(btn_nav).removeClass("d-none");
            $(navList).addClass("d-none");
        } else {
            $(btn_nav).addClass("d-none");
            $(navList).removeClass("d-none mt-4");

        }
        var nav = document.getElementById('nav');
        var navBg = document.getElementById("navBg");
        navBg.style.height = nav.offsetHeight + "px";
    }

    function toggleNav() {
        var navList = $("#navList")
        var s2nav = $("s2nav")
        // s2nav.append(navList);
        $(navList).toggleClass('d-none')
        $(navList).toggleClass('mt-4')
    }
</script>

</html>