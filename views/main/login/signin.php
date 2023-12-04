<!DOCTYPE html>
<html lang="en">

<?php
$_SESSION['role'] = 'guest';
// if (isset($_COOKIE['customer_id'])) setcookie("hello", "", time() - 3600);
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['username']) && isset($_POST['password'])) {
//         $username = $_POST['username'];
//         $password = $_POST['password'];
//         if (strlen($username) > 20 || strlen($username) < 1) $error = 'Tên đăng nhập: 1-20 ký tự';
//         else if (strlen($password) > 20 || strlen($password) < 1) $error = 'Mật khẩu: 1-20 ký tự';
//     }

//     // if (isset($_SESSION['role'])) unset($_SESSION);
//     // $role = $_POST['role'];
//     // $_SESSION['role'] = $role;
//     // session_write_close();
//     // $headerTo = "Location: ?page=" . $role . "&controller=layouts&action=index";
//     // header($headerTo);
//     // exit;
// }

require_once("views/main/header.php") ?>


<!-- <div class="row my-5">
        <div class="col-3 offset-3">
            <form action="" method="POST">
                <select name="role" class="form-select" aria-label="Default select example">
                    <option value="main" selected>Guest</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" class="btn hover-bg-orange hover-c-white border-c-orange c-orange mt-3">Login</button>
            </form>
        </div>
</div> -->

<div>
    <div class="position-relative w-100 py-5 mt-5">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 border-c-orange">
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