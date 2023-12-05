<?php require_once('views/admin/header.php'); ?>

<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý khách hàng</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3><strong>Quản lý khách hàng</strong></h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertCustomerModal">
                    Thêm khách hàng
                </button>
                <table id="customer-table"class="table table-hover nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tuổi</th>
                            <th scope="col">Email</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thành viên sẽ được hiển thị ở đây -->
                        <?php
                        foreach ($customers as $customer) {
                            echo "
                            <tr>
                                <th scope=\"row\">{$customer->customer_id}</th>
                                <td>{$customer->customer_name}</td>
                                <td>{$customer->age}</td>
                                <td>{$customer->email}</td>
                                <td>{$customer->gender}</td>
                                <td>
                                    <button type=\"button\" class=\"btn btn-warning editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editModal\"
                                        data-customer-id=\"{$customer->customer_id}\"
                                        data-customer-name=\"{$customer->customer_name}\"
                                        data-customer-age=\"{$customer->age}\"
                                        data-customer-email=\"{$customer->email}\"
                                        data-customer-gender=\"{$customer->gender}\"
                                    ><i class=\"fa-solid fa-pen-to-square\"></i></button>
                                    <button type=\"button\" class=\"btn btn-danger deletebtn\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\"
                                        data-customer-id=\"{$customer->customer_id}\">
                                        <i class=\"fa-solid fa-trash\"></i>
                                    </button>
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Insert Modal -->
        <div class="modal fade" id="insertCustomerModal" tabindex="-1" aria-labelledby="insertCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h1 class="modal-title fs-5" id="insertCustomerModalLabel">Thêm khách hàng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?page=admin&controller=customers&action=add" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Tuổi</label>
                                <input type="number" class="form-control" name="age" id="age" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Giới tính</label>
                                <select class="form-select" name="gender" id="gender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <button type="reset" class="btn btn-secondary">Xoá tất cả</button>
                            <button type="submit" name="addCustomer" class="btn btn-success">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Chỉnh sửa thông tin khách hàng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=admin&controller=customers&action=edit" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="customerIdToEdit">
                            <div class="mb-3">
                                <label for="nameEdit" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="nameEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="ageEdit" class="form-label">Tuổi</label>
                                <input type="number" class="form-control" name="age" id="ageEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailEdit" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="emailEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="genderEdit" class="form-label">Giới tính</label>
                                <select class="form-select" name="gender" id="genderEdit" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Xác nhận</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=admin&controller=customers&action=delete" method="post">
                        <div class="modal-body">
                            Bạn có muốn xoá khách hàng này?
                            <input type="hidden" name="customer_id" id="customerId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Xoá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
</main>

<?php require_once('views/admin/footer.php'); ?>

<script>
    $('.deletebtn').on('click', function () {
        var customerId = $(this).data('customer-id');
        $('#customerIdToDelete').text(customerId);
        $('#customerId').val(customerId);
    });

    $('#deleteModal').on('show.bs.modal', function () {
        var customerId = $('#customerIdToDelete').text();
        var deleteFormAction = 'index.php?page=admin&controller=customers&action=delete&customer_id=' + customerId;
        $('#deleteModal form').attr('action', deleteFormAction);
    });

    $('.editbtn').on('click', function () {
        var customerId = $(this).data('customer-id');
        var nameEdit = $(this).data('customer-name');
        var ageEdit = $(this).data('customer-age');
        var emailEdit = $(this).data('customer-email');
        var genderEdit = $(this).data('customer-gender');

        $('#customerIdToEdit').val(customerId);
        $('#nameEdit').val(nameEdit);
        $('#ageEdit').val(ageEdit);
        $('#emailEdit').val(emailEdit);
    });
</script>
<script>
    // Use DataTables to implement simple sort, search
    $(document).ready(function() {
        $('#customer-table').DataTable( {
                "scrollX": true
            }
        );
    });
</script>


