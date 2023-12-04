<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'employee') {
    header("Location: ?page=main&controller=login&action=signin");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNG Corporation</title>
    <link href="https://corp.vcdn.vn/products/upload/vng/source/Gallery/LOGO%20VNG/MasterArtwork-OrangeVNG%20Master.png" rel="icon">
    <script src="https://kit.fontawesome.com/afc5cf6ed9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/Bootstrap_css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include('sidebar.php') ?>
        <div class="main">
            <?php include('navbar.php') ?>