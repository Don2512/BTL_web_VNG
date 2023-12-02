<?php
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
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css/bootstrap.min.css">
    <link rel="stylesheet" href="public\css\style.css">
    <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>VNG</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-0 border-bottom border border-secondary">
        <div class="container" style="height:82px; max-width:1200px;">
            <div class="row w-100">
                <div class="col-auto">
                    <a class="navbar-brand" href="index.php?page=main&controller=layouts&action=index"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/VNG_Corp._logo.svg/1200px-VNG_Corp._logo.svg.png" style="max-width:60px" /></a>
                </div>
                <div class="col-auto">
                    <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col">
                    <div class="collapse navbar-collapse w-100" id="navbarNav">
                        <div class="row w-100">
                            <div class="col"></div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "about") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=about&action=index">
                                            Về VNG
                                        </a>
                                    </div>
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "blog") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=blog&action=index">Tin tức</a>
                                    </div>
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "product") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=product&action=index">Sản phẩm</a>
                                    </div>
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "human") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=human&action=index">Con người</a>
                                    </div>
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "society") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=society&action=index">Trách nhiệm cộng đồng</a>
                                    </div>
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "job") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=order&action=index">Cơ hội nghề nghiệp</a>
                                    </div>
                                    <!-- LOGIN -->
                                    <div class="col-auto px-1 py-1 dotUnder position-relative <?php if ($page == "login") echo 'active' ?>">
                                        <a class="nav-link text-decoration-none text-black" href="index.php?page=main&controller=login&action=index">Đăng nhập</a>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </nav>
</body>
<script src="public/js/bootstrap_js/bootstrap.min.js"></script>


</html>