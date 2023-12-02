<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý sản phẩm</strong> </h3>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    Thêm sản phẩm
                </button>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thời gian thêm vào</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // product_id INT PRIMARY KEY AUTO_INCREMENT,
                    // name VARCHAR(255),
                    // category VARCHAR(255),
                    // price DECIMAL(10, 2),
                    // date_added DATE,
                    // image VARCHAR(255)
                    foreach ($products as $product) {
                        echo
                        "
                        <tr></tr>
                            <td>" . $product->id . "</td>
                            <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px;\">" . $product->name . "</span></td>
                            <td>" . $product->category . "</td>
                            <td>" . $product->price . "</td>
                            <td>" . $product->date_added . "</td>
                            <td><img src=" . $product->image . " class=\"img-fluid\"></td>
                            <td>
                                <a href=\"index.php?page=admin&controller=products&action=edit\" class=\"btn btn-warning btn-sm modalButton\" data-bs-toggle=\"modal\" 
                                data-bs-target=\"#editProduct\" data-productid=" . $product->id . ">
                                    <i class=\"fa-solid fa-pen\"></i>
                                </a>
                                <a href=\"index.php?page=admin&controller=products&action=delete\" class=\"btn btn-danger btn-sm modalButton\" data-bs-toggle=\"modal\"
                                data-bs-target=\"#deleteProduct\" data-productid=" . $product->id . ">
                                    <i class=\"fa-solid fa-trash\"></i>
                                </a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Add Product -->
            <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModal">Thêm bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form action="index.php?page=admin&controller=products&action=add" method="post">
                                <!-- Article ID Field-->
                                <div class="mb-3">
                                    <label for="title" class="form-label">ID</label>
                                    <input type="text" class="form-control" id="addArticleId" name="addArticleId" placeholder="Article ID" readonly>
                                </div>

                                <!-- Title Field -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="addTitle" name="addName" placeholder="Title">
                                </div>

                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="type" class="form-label">Thể loại</label>
                                    <input type="text" class="form-control" id="addCategory" name="addCategory" placeholder="Enter category">
                                </div>

                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="authorId" class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="addPrice" name="addPrice" placeholder="Enter price">
                                </div>

                                <!-- date -->
                                <div class="mb-3">
                                    <label for="authorId" class="form-label">Thời gian thêm vào</label>
                                    <input type="text" class="form-control" id="addDate" name="addDateAdded" placeholder="Enter date">
                                </div>

                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="authorId" class="form-label">Hình ảnh</label>
                                    <input type="text" class="form-control" id="addImage" name="addImage" placeholder="Enter image link">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- CLose button -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Product -->
            <div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModal">Chỉnh sửa sản phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form action="index.php?page=admin&controller=products&action=edit" method="post">
                                <!-- Product ID Field-->
                                <div class="mb-3">
                                    <label for="title" class="form-label">ID</label>
                                    <input type="text" class="form-control" id="editProductId" name="editProductId" placeholder="Product ID" readonly>
                                </div>

                                <!-- Title Field -->
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="editName" name="editName" placeholder="Title">
                                </div>

                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="editCategory" class="form-label">Thể loại</label>
                                    <input type="text" class="form-control" id="editCategory" name="editCategory" placeholder="Enter category">
                                </div>

                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="editPrice" class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="editPrice" name="editPrice" placeholder="Enter price">
                                </div>

                                <!-- date -->
                                <div class="mb-3">
                                    <label for="editDate" class="form-label">Thời gian thêm vào</label>
                                    <input type="text" class="form-control" id="editDate" name="editDateAdded" placeholder="Enter date">
                                </div>

                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="editImage" class="form-label">Hình ảnh</label>
                                    <input type="text" class="form-control" id="editImage" name="editImage" placeholder="Enter image link">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- CLose button -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Delete Product -->
            <div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteProductModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteProductModal">Xóa sản phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?page=admin&controller=products&action=delete" method="post">
                                <h2 class="text-danger">Bạn có chắc muốn xóa sản phẩm này không</h2>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product ID</label>
                                    <input type="text" class="form-control" id="deleteProductId" name="deleteProductId" placeholder="Product ID" readonly>
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-danger">Xóa</button>
                                <!-- CLose button -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all the edit buttons with the class 'modalButton'
        var editButtons = document.querySelectorAll('.modalButton');

        // Add click event listeners to each modal button
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the product data and productId from the data attributes
                var productId = button.getAttribute('data-productid');
                console.log(productId);
                // Populate the modal with the product data
                populateEditModal(productId);
            });

        });

        function populateEditModal(productId) {
            // Code to populate the modal fields with productData
            document.getElementById('editProductId').value = productId;
            document.getElementById('deleteProductId').value = productId;
        }
    });
</script>
<?php
require_once('views/admin/footer.php'); ?>