<!DOCTYPE html>
<html lang="en">


<?php
$controller = "job";
require_once("views/main/header.php") ?>


<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-md-10 col-12">
        <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Sản Phẩm đã đặt vào kho hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Thể loại</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $id => $item) { ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><img src="<?php echo $item['image'] ?>" class="img-thumbnail" style="max-width: 100px;"></td>
                        <td><?php echo $item['category']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['number']; ?></td>
                        <td><a href="index.php?page=main&controller=order&action=myOrder&&remove_id=<?php echo $id; ?>" class="btn btn-danger">Xóa</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Tổng tiền:</strong></td>
                    <td><strong><?php echo $total; ?>.000</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php require_once("views/main/footer.php") ?>