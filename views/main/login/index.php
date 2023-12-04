<!DOCTYPE html>
<html lang="en">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['role'])) unset($_SESSION);
    $role = $_POST['role'];
    $_SESSION['role'] = $role;

    session_write_close();
    $headerTo = "Location: index.php?page=main&controller=about&action=index";
    header($headerTo);
    exit;
}
require_once("views/main/header.php") ?>

<div>
    <div class="row my-5">
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
    </div>

</div>




<?php require_once("views/main/footer.php") ?>