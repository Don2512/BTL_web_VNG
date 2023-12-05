<?php require_once('views/admin/header.php'); ?>

<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý thành viên</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3><strong>Quản lý thành viên</strong></h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertMemberModal">
                    Thêm thành viên
                </button>
                <table id="member-table"class="table table-hover nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tuổi</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Chi nhánh</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu thành viên sẽ được hiển thị ở đây -->
                        <?php
                        foreach ($members as $member) {
                            echo "
                            <tr>
                                <th scope=\"row\">{$member->employee_id}</th>
                                <td>{$member->employee_name}</td>
                                <td>{$member->age}</td>
                                <td>{$member->position}</td>
                                <td>{$member->phone}</td>
                                <td>{$member->description}</td>
                                <td>{$member->department}</td>
                                <td>{$member->gender}</td>
                                <td>{$member->branch}</td>
                                <td>
                                    <button type=\"button\" class=\"btn btn-warning editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editModal\"
                                        data-employee-id=\"{$member->employee_id}\"
                                        data-employee-name=\"{$member->employee_name}\"
                                        data-employee-age=\"{$member->age}\"
                                        data-employee-position=\"{$member->position}\"
                                        data-employee-phone=\"{$member->phone}\"
                                        data-employee-description=\"{$member->description}\"
                                        data-employee-department=\"{$member->department}\"
                                        data-employee-gender=\"{$member->gender}\"
                                        data-employee-branch=\"{$member->branch}\"><i class=\"fa-solid fa-pen-to-square\"></i></button>
                                    <button type=\"button\" class=\"btn btn-danger deletebtn\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\"
                                        data-employee-id=\"{$member->employee_id}\">
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
        <div class="modal fade" id="insertMemberModal" tabindex="-1" aria-labelledby="insertMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h1 class="modal-title fs-5" id="insertMemberModalLabel">Thêm thành viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?page=admin&controller=members&action=add" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Tuổi</label>
                                <input type="number" class="form-control" name="age" id="age" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Chức vụ</label>
                                <input type="text" class="form-control" name="pos" id="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone" id="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Phòng ban</label>
                                <input type="text" class="form-control" name="department" id="department" required>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="gender" class="form-label">Giới tính</label>
                                <input type="text" class="form-control" name="gender" id="gender" required> -->
                                <label for="gender" class="form-label">Giới tính</label>
                                <select class="form-select" name="gender" id="gender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="branch" class="form-label">Chi nhánh</label>
                                <input type="number" class="form-control" name="branch" id="branch" required>
                            </div>
                            <button type="reset" class="btn btn-secondary">Xoá tất cả</button>
                            <button type="submit" name="addMember" class="btn btn-success">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- edit modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h1 class="modal-title fs-5" id="editModalLabel">Chỉnh sửa thông tin thành viên</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="index.php?page=admin&controller=members&action=edit" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="employeeIdToEdit">
                            <div class="mb-3">
                                <label for="nameEdit" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="nameEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="ageEdit" class="form-label">Tuổi</label>
                                <input type="number" class="form-control" name="age" id="ageEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="positionEdit" class="form-label">Chức vụ</label>
                                <input type="text" class="form-control" name="pos" id="positionEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="phoneEdit" class="form-label">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone" id="phoneEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="descriptionEdit" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" name="description" id="descriptionEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="departmentEdit" class="form-label">Phòng ban</label>
                                <input type="text" class="form-control" name="department" id="departmentEdit" required>
                            </div>
                            <div class="mb-3">
                                <label for="genderEdit" class="form-label">Giới tính</label>
                                <select class="form-select" name="gender" id="genderEdit" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="branchEdit" class="form-label">Chi nhánh</label>
                                <!-- <input type="number" class="form-control" name="branch" id="branchEdit" required> -->
                                <select class="form-select" name="branch" id="branchEdit" required>
                                    <option value="1">Chi nhánh 1</option>
                                    <option value="2">Chi nhánh 2</option>
                                    <option value="3">Chi nhánh 3</option>
                                    <option value="4">Chi nhánh 4</option>
                                    <option value="5">Chi nhánh 5</option>
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
                    <form action="index.php?page=admin&controller=members&action=delete" method="post">
                        <div class="modal-body">
                            Bạn có muốn xoá nhân viên này?
                            <!-- <br>
                            <span id="employeeIdToDelete"></span> -->
                            <input type="hidden" name="employee_id" id="employeeId">
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
</main>

<?php require_once('views/admin/footer.php'); ?>

<script>
    $('.deletebtn').on('click', function () {
        var employeeId = $(this).data('employee-id');
        $('#employeeIdToDelete').text(employeeId);
        $('#employeeId').val(employeeId);
    });

    $('#deleteModal').on('show.bs.modal', function () {
        var employeeId = $('#employeeIdToDelete').text();
        var deleteFormAction = 'index.php?page=admin&controller=members&action=delete&employee_id=' + employeeId;
        $('#deleteModal form').attr('action', deleteFormAction);
    });

    $('.editbtn').on('click', function () {
        var employeeId = $(this).data('employee-id');
        var nameEdit = $(this).data('employee-name');
        var ageEdit = $(this).data('employee-age');
        var positionEdit = $(this).data('employee-position');
        var phoneEdit = $(this).data('employee-phone');
        var descriptionEdit = $(this).data('employee-description');
        var departmentEdit = $(this).data('employee-department');
        var genderEdit = $(this).data('employee-gender');
        var branchEdit = $(this).data('employee-branch');

        $('#employeeIdToEdit').val(employeeId);
        $('#nameEdit').val(nameEdit);
        $('#ageEdit').val(ageEdit);
        $('#positionEdit').val(positionEdit);
        $('#phoneEdit').val(phoneEdit);
        $('#descriptionEdit').val(descriptionEdit);
        $('#departmentEdit').val(departmentEdit);
        $('#genderEdit').val(genderEdit);
        $('#branchEdit').val(branchEdit);
    });
</script>
<script>
    // Use DataTables to implement simple sort, search
    $(document).ready(function() {
        $('#member-table').DataTable( {
                "scrollX": true
            }
        );
    });
</script>


