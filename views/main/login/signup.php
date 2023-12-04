<!DOCTYPE html>
<html lang="en">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['role'])) unset($_SESSION);
    $role = $_POST['role'];
    $_SESSION['role'] = $role;
    session_write_close();
    $headerTo = "Location: ?page=" . $role . "&controller=layouts&action=index";
    header($headerTo);
    exit;
}

require_once("views/main/header.php") ?>


<div>
    <div class="position-relative w-100 py-5 my-5">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 border-c-orange">
                    <div class="fs-2 text-center my-3">Đăng ký</div>
                    <div id="notiBox" class="bg-orange py-2 w-75 mx-auto mb-3 d-none">
                        <div class="fs px-3 text-white" id="notiText">Something warning here</div>
                    </div>
                    <div class="w-75 py-2 mx-auto">
                        <form action="" method="POST" id="signupForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Tuổi</label>
                                <input type="text" class="form-control" id="age" aria-describedby="emailHelp" name="age">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3">
                                Giới tính
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="nam" checked>
                                    <label class="form-check-label" for="nam">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="nu">
                                    <label class="form-check-label" for="nu">
                                        Nữ
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="bg-white-100 p-2 border-c-orange hover-bg-orange hover-c-white">Đăng ký</button>
                        </form>
                    </div>
                    <div class="w-75 mb-3 mx-auto py-2">
                        <div class="fs-6 fst-italic">Đã có tài khoản? <a href="?page=main&controller=login&action=signin" class="text-decoration-none c-orange hover-c-orange">Đăng nhập!</a></div>
                    </div>

                </div>
            </div>

        </div>




    </div>
</div>

<script>
    $(document).ready(function() {

        $('#signupForm').submit(function(event) {
            event.preventDefault();
            console.log('sign up check');
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'http://localhost/index.php?page=main&controller=login&action=signup_action',
                data: formData,
                success: function(response) {
                    // Xử lý phản hồi từ server ở đây (nếu cần)
                    console.log(response);
                    // if (response == "customer") {
                    //     window.location.href = "?page=main&controller=layouts&action=index"
                    // }
                    if (response != "added account") {
                        var notiBox = document.getElementById('notiBox');
                        var notiText = document.getElementById('notiText');
                        if (response == "invalidName")
                            notiText.innerText = "Độ dài tên: 1-30 ký tự!"
                        else if (response == "charAge")
                            notiText.innerText = "Độ tuổi chỉ nhận dữ liệu số!"
                        else if (response == "invalidAge")
                            notiText.innerText = "Yêu cầu từ 12 tuổi trở lên!"
                        else if (response == "invalidEmail")
                            notiText.innerText = "Email không hợp lệ!"
                        else if (response == "invalidUsername")
                            notiText.innerText = "Tên đăng nhập: 1-20 ký tự!"
                        else if (response == "invalidPassword")
                            notiText.innerText = "Mật khẩu: 1-20 ký tự!"
                        else if (response == "usedEmail")
                            notiText.innerText = "Email đã được sử dụng!"
                        else if (response == "usedUsername")
                            notiText.innerText = "Tên đăng nhập đã tồn tại!"
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