<!DOCTYPE html>
<html lang="en">
<?php 
    $check = false;
    $array = array();
    if(isset($_POST["edit"]))
    {
        $customer_id = $_POST["customer_id"];
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $email = $_POST["email"];
    }
    $array [] = "Tên sai";
    $array [] = "Tuổi";
    $array [] = "Email sai";     
?>

<?php
require_once("views/main/header.php") ?>
<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-7 col-md-9 col-12">
            <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Chỉnh sửa thông tin cá nhân</h1>
            <div class="row">
                <input type="hidden" class="form-control" name="customer_id" id="customer_idEdit" required>
                <div class="col-lg-10">
                    <label for="nameEdit" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="name" id="nameEdit" required>
                </div>
                <div class="col-lg-2">
                    <label for="genderEdit" class="form-label">Giới tính</label>
                    <select class="form-select" name="gender" id="genderEdit" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div>
                    <label for="nameEdit" class="form-label">Tuổi</label>
                    <input type="text" class="form-control" name="age" id="ageEdit" required>
                </div>
                <div >
                    <label for="nameEdit" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="emailEdit" required>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary Paymentbtn" data-bs-toggle="modal" data-bs-target="#PaymentModal">Lưu thay đổi</button>
                </div>
            </div>

           
        </div>
        <div class="modal fade" id="PaymentModal" tabindex="-1" aria-labelledby="PaymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header <?php echo( $check ? "bg-success" : "bg-danger") ?>  text-white">
                        <h1 class="modal-title fs-5" id="PaymentModalLabel"><?php echo($check ? "Cập nhật thành công!" : "Cập nhật thất bại") ?></h1>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <p><?php echo($check ? "Dữ liệu đã cập nhật!" : "Chỉnh lại thông tin cho phù hợp !") ?></p>
                        <?php if(!$check){
                            foreach($array as $er){
                                echo "<p> $er</p>";
                            }
                        }?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-9 col-md-9 col-12">
        <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Số lượng vật phẩm mua trong tuần này</h1>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>

</div>
<script>
    window.onload = function() {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## lần",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    }


    $('.Paymentbtn').on('click', function () {
        var removeId = $(this).data('remove_id');
    });

    $('#PaymentModal').on('show.bs.modal', function () {
        $('#PaymentModal form').attr('action');
    });
</script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php require_once("views/main/footer.php") ?>