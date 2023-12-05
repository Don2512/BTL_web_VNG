<!DOCTYPE html>
<html lang="en">


<?php
$controller = "job";
require_once("views/main/header.php") ?>

<div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 col-md-10 col-12">
            <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Sản Phẩm đã đặt vào kho hàng</h1>
            <table class="table table-striped">
                <thead class="table-dark" style="color:#FFFFFF; background-color: #ff6a1f;">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th class="d-none d-sm-table-cell">Ảnh</th>
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
                            <td class="d-none d-sm-table-cell"><img src="<?php echo $item['image'] ?>" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td><?php echo $item['category']; ?></td>
                            <td>$<?php echo $item['price']; ?>0</td>
                            <td><?php echo $item['number']; ?></td>
                            <td>
                                <button type="button"  class="btn btn-danger btn-sm modalButton deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-remove_id= "<?php echo $id; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3"></td>
                        <td><strong>Tổng tiền:</strong></td>
                        <td><strong><?php echo $total; ?>.000</strong></td>
                    </tr>
                </tbody>
            </table>

            <a href="index.php?page=main&controller=order&action=index" class="btn btn-primary" style="color:#FFFFFF; background-color: #ff6a1f; border: 1px solid gray;">Quay lại</a>
            <button class="btn btn-outline-success Paymentbtn"  data-bs-toggle="modal" data-bs-target="#PaymentModal" >Thanh Toán</button>
        </div>    
    </div>

    <div class="modal fade" id="PaymentModal" tabindex="-1" aria-labelledby="PaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5" id="PaymentModalLabel">Xác nhận</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <?php if(count($_SESSION['cart']) == 0 ){?> giỏ hàng của bạn đang rỗng nên không thể thanh toán được!!!
                    <?php } else {?> Bạn có muốn thanh toán hàng này?  <?php } ?>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <?php if(count($_SESSION['cart']) != 0 ){?> <button type="submit" class="btn btn-success" onclick="makePayment();">Thanh toán</button>  <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Xác nhận</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=main&controller=order&action=myOrder" method="post">
                        <div class="modal-body">
                            Bạn có muốn xoá sản phẩm này?
                            <!-- <br> -->
                            <!-- <span id="removeIdToDelete"></span> -->
                            <input type="hidden" name="remove_id" id="removeId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Xoá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</div>
<script>

    $('.deletebtn').on('click', function () {
        var removeId = $(this).data('remove_id');
        $('#removeIdToDelete').text(removeId);
        $('#removeId').val(removeId);
    });


    $('.Paymentbtn').on('click', function () {
        var removeId = $(this).data('remove_id');
    });

    $('#PaymentModal').on('show.bs.modal', function () {
        $('#PaymentModal form').attr('action');
    });

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
            } else {
                // Xử lý lỗi khi yêu cầu AJAX không thành công
                console.error('Lỗi khi gọi AJAX');
            }
        };

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Gửi yêu cầu AJAX
        xhr.send();
        window.location.href = "index.php?page=main&controller=information&action=purchaseHistory";
    }
</script>

<?php require_once("views/main/footer.php") ?>