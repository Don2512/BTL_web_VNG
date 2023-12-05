<!DOCTYPE html>
<html lang="en">

<?php
$_SESSION['role'] = 'guest';


require_once("views/main/header.php") ?>

<div>
    <div class="position-relative w-100 py-5" style="background-image: url('https://corp.vcdn.vn/products/upload/vng/source/Gallery/Văn%20phòng/21.jpg'); background-size: cover;">

        <div class=" container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 border-c-orange bg-white border-3">
                    <div class="fs-2 text-center my-3">Đăng nhập</div>
                    <div id="notiBox" class="bg-orange py-2 w-75 mx-auto mb-3 d-none">
                        <div id="notiText" class="fs px-3 text-white">Tên đăng nhập hoặc mật khẩu không hợp lệ</div>
                    </div>
                    <div class="w-75 py-2 mx-auto">
                        <form id="signinForm" action="" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember" value="1">Ghi nhớ đăng nhập</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="employee" name="employee">
                                <label class="form-check-label" for="employee" value="1">Đăng nhập với tư cách người quản lý</label>
                            </div>
                            <button type="submit" class="bg-white-100 p-2 border-c-orange hover-bg-orange hover-c-white">Đăng nhập</button>
                        </form>
                    </div>
                    <div class="w-75 mb-3 mx-auto py-2">
                        <div class="fs-6 fst-italic">Chưa có tài khoản? <a href="?page=main&controller=login&action=signup" class="text-decoration-none c-orange hover-c-orange">Đăng ký!</a></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Gọi controller khi trang được tải
        $.ajax({
            type: 'POST', // hoặc 'POST' tùy thuộc vào phương thức của controller
            url: 'http://localhost/index.php?page=main&controller=login&action=signout_action',
            success: function(response) {
                console.log(response);
                // Xử lý phản hồi từ server nếu cần

                // window.location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    $(document).ready(function() {

        $('#signinForm').submit(function(event) {
            event.preventDefault();
            console.log('sign in check');
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'http://localhost/index.php?page=main&controller=login&action=signin_action',
                data: formData,
                success: function(response) {
                    // Xử lý phản hồi từ server ở đây (nếu cần)
                    console.log(response);
                    if (response == "customer") {
                        window.location.href = "?page=main&controller=layouts&action=index"
                    } else if (response == "employee") {
                        window.location.href = "?page=admin&controller=layouts&action=index"
                    }
                    if (response == "guest") {
                        var notiBox = document.getElementById('notiBox');
                        var notiText = document.getElementById('notiText');

                        notiBox.classList.toggle("d-none");

                    }
                    // window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>




<?php require_once("views/main/footer.php") ?>