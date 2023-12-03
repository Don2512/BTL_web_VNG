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

        <a href="index.php?page=main&controller=order&action=index" class="btn btn-primary">Quay lại</a>
        <button class="btn btn-primary" onclick="makePayment()">Thanh Toán</button>
    </div>

    
</div>


<script>
    function makePayment() {
        // Tạo đối tượng XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Xác định phương thức và URL của yêu cầu AJAX
        xhr.open('POST', 'index.php?page=main&controller=order&action=payment', true);

        // Xử lý sự kiện khi yêu cầu AJAX hoàn thành
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Xử lý dữ liệu nhận được từ phản hồi AJAX
                var response = xhr.responseText;
                console.log(response);
                // Hiển thị thông báo "Thanh toán thành công"
                alert("Thanh toán thành công");


            } else {
                // Xử lý lỗi khi yêu cầu AJAX không thành công
                console.error('Lỗi khi gọi AJAX');
               
            }
            
        };

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Gửi yêu cầu AJAX
        xhr.send();
        window.location.href = "index.php?page=main&controller=order&action=index";
    }
</script>

<?php require_once("views/main/footer.php") ?>