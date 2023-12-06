<!DOCTYPE html>
<html lang="en">
<?php
$check = true;
$array = array();

$customer_id = $customer->customer_id;
$name = $customer->customer_name;
$gender = $customer->gender;
$age = $customer->age;
$email = $customer->email;

if (isset($_POST["edit"])) {
    $customer_id = $_POST["customer_id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $email = $_POST["email"];

    if (strlen($name) < 2 || strlen($name) > 100) {
        $array[] = "Tên không hợp lệ";
        $check = false;
    }

    if ($age < 12 || $age > 120) {
        $array[] = "Tuổi không hợp lệ.";
        $check = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $array[] = "Địa chỉ email không hợp lệ.";
        $check = false;
    }
}
?>

<?php
require_once("views/main/header.php") ?>
<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-7 col-md-9 col-12 ps-4">
            <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Chỉnh sửa thông tin cá nhân</h1>
            <div class="row">
                <form action="index.php?page=main&controller=information&action=index" method="post">
                    <input type="hidden" class="form-control" name="customer_id" id="customer_idEdit" value="<?php echo $customer_id ?>" required>
                    <div class="col-lg-10 mb-3">
                        <label for="nameEdit" class="form-label"></label>Họ và tên</label>
                        <input type="text" class="form-control" name="name" id="nameEdit" value="<?php echo $name ?>" required>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label for="genderEdit" class="form-label">Giới tính</label>
                        <select class="form-select" name="gender" id="genderEdit" required>
                            <option value="Nam" <?php echo ($gender == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                            <option value="Nữ" <?php echo ($gender == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                        </select>
                    </div>
                    <div>
                        <label for="nameEdit" class="form-label">Tuổi</label>
                        <input type="text" class="form-control mb-3" name="age" id="ageEdit" value="<?php echo $age ?>" required>
                    </div>
                    <div>
                        <label for="nameEdit" class="form-label">Email</label>
                        <input type="text" class="form-control mb-3" name="email" id="emailEdit" value="<?php echo $email ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>


        </div>
        <div class="modal fade" id="PaymentModal" tabindex="-1" aria-labelledby="PaymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header <?php echo ($check ? "bg-success" : "bg-danger") ?>  text-white">
                        <h1 class="modal-title fs-5" id="PaymentModalLabel"><?php echo ($check ? "Dữ liệu chính xác!" : "Dữ liệu thất bại") ?></h1>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo ($check ? "Bạn muốn thay đổi!" : "Chỉnh lại thông tin cho phù hợp !") ?></p>
                        <?php if (!$check) {
                            foreach ($array as $er) {
                                echo "<p> $er</p>";
                            }
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <?php if ($check) { ?> <button type="submit" class="btn btn-success" data-bs-dismiss="modal" onclick="update();">Cập nhật</button> <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-9 col-md-9 col-12 ps-4 mb-3">
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
    <?php if (isset($_POST["edit"])) { ?> $(document).ready(function() {
            $("#PaymentModal").modal("show");
        }) <?php } ?>


        function update() {
            event.preventDefault();

            var customer_id = '<?php echo $customer_id; ?>';
            var customer_name = '<?php echo $name; ?>';
            var gender = '<?php echo $gender; ?>';
            var age = '<?php echo $age; ?>';
            var email = '<?php echo $email; ?>';
            var formData = {
                customer_id: customer_id,
                customer_name: customer_name,
                gender: gender,
                age: age,
                email: email
            };
            var serializedData = $.param(formData);
            console.log("!232");
            $.ajax({
                type: 'POST',
                url: 'index.php?page=main&controller=information&action=updateCustomer',
                data: formData,
                success: function(response) {
                    // Xử lý phản hồi từ server ở đây (nếu cần)
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
</script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php require_once("views/main/footer.php") ?>