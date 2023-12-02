<?php
require_once('views/admin/header.php'); ?>
<main class="content px-3 py-2 w-100">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
            </ol>
        </nav>
        <div class="card border-0">
            <div class="card-header">
                <h3> <strong>Quản lý bài viết</strong> </h3>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArticle">
                    Thêm bài viết
                </button>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tiểu đề</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Thời gian đăng bài</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($articles as $article) {
                        $counter = 1;
                        $content_in_article = "<div class=\"hstack gap-1\"> ";
                        foreach ($article->content as $c_i_a) {
                            $title = "<strong>" . $c_i_a->title . "</strong><br>";
                            $image = "<img src=" . $c_i_a->image . " class=\"img-fluid\" alt=\"pic-" . $counter . "\"><br>";
                            $counter += 1;
                            $text = "<p>" . $c_i_a->content . "</p><br>";

                            $content_in_article = $content_in_article . $title . $image . $text . "</div>";
                        }
                        echo
                        "
<tr>
    <th scope=\"row\">" . $article->id . "</th>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px;\">" . $article->title . "</span></td>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px;\">" . $article->subtitle . "</span></td>
    <td>" . $article->type . "</td>
    <td>" . $article->author_id . "</td>
    <td>" . $article->date . "</td>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px; max-height:300px;\">" . $content_in_article . "</span></td>  
    <td>
        <div class=\"vstack gap-2\">
            <div class=\"hstack gap-2\">
                <!-- Button to trigger edit article modal -->
                <a href=\"index.php?page=admin&controller=articles&action=edit\" class=\"btn btn-warning btn-sm modalButton\" data-bs-toggle=\"modal\" 
                data-bs-target=\"#editArticle\" data-articleid=" . $article->id . ">
                    <i class=\"fa-solid fa-pen\"></i>
                </a>
                <a href=\"index.php?page=admin&controller=articles&action=delete\" class=\"btn btn-danger btn-sm modalButton\" data-bs-toggle=\"modal\" 
                data-bs-target=\"#deleteArticle\" data-articleid=" . $article->id . ">
                    <i class=\"fa-solid fa-trash\"></i>
                </a>
            </div>
            <div class=\"hstack gap-2\">
                <a href=\"index.php?page=admin&controller=articles&action=editContent\" class=\"btn btn-success btn-sm modalButton\" data-bs-toggle=\"modal\" 
                data-bs-target=\"#editContent\" data-articleid=" . $article->id . "> 
                    <i class=\"fa-solid fa-file-pen\"></i>
                </a>
                <a href=\"index.php?page=admin&controller=articles&action=editContent\" class=\"btn btn-success btn-sm modalButton\"> 
                    <i class=\"fa-solid fa-file-circle-plus\"></i>
                </a>
            </div>
        </div>
    </td>
</tr>
";

                        $counter = $counter + 1;
                    }
                    ?>
                </tbody>

            </table>
            <!-- Edit Content Modal -->
            <div class="modal fade" id="editContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa nô</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- Form -->
                            <form action="index.php?page=admin&controller=articles&action=editContent" method="post">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tiêu đề nội dung
                                    </button>
                                    <ul class="dropdown-menu editContentId">
                                        <?php
                                        $contentCounter = 0;
                                        foreach ($article->content as $c_i_a) {
                                            $title = "<strong>" . $c_i_a->title . "</strong><br>";
                                            echo "<li><a class=\"dropdown-item\" href=\"index.php?page=admin&controller=articles&action=editContent&cnt=" . $contentCounter . "\">" . $title . "</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                
                                $title = "";
                                $image = "";
                                $text = "";
                                if (isset($_GET['cnt'])) {
                                    $content = $article->content[$_GET['cnt']];

                                    $title = $content->title;
                                    $image = $content->image;
                                    $text = $content->content;
                                }
                                ?>
                                <!-- Title Field -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề nội dung</label>
                                    <input type="text" class="form-control" id="title" name="contentTitle" placeholder="<?php echo $title; ?>" readonly>
                                </div>

                                <!-- Content Field -->
                                <div class="mb-3">
                                    <label for="contentText" class="form-label">Văn bản nội dung</label>
                                    <textarea class="form-control" id="contentText" rows="3" name="contentText" placeholder="<?php echo $text; ?>"></textarea>
                                </div>

                                <!-- Content Field -->
                                <div class="mb-3">
                                    <label for="contentText" class="form-label">Văn bản nội dung</label>
                                    <textarea class="form-control" id="contentText" rows="3" name="contentText" placeholder="<?php echo $text; ?>"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <!-- Delete Button -->
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                <!-- Close button -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <!-- Add Article -->
            <div class="modal fade" id="addArticle" tabindex="-1" aria-labelledby="addArticleModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addArticleModal">Thêm bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form action="index.php?page=admin&controller=articles&action=add" method="post">
                                <!-- Title Field -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                </div>

                                <!-- Subtitle Field -->
                                <div class="mb-3">
                                    <label for="subtitle" class="form-label">Tiểu đề</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                                </div>

                                <!-- Type Field -->
                                <div class="mb-3">
                                    <label for="type" class="form-label">Thể loại</label>
                                    <input type="text" class="form-control" id="type" name="type" placeholder="Enter type">
                                </div>

                                <!-- Author_id Field -->
                                <div class="mb-3">
                                    <label for="authorId" class="form-label">Mã tác giả</label>
                                    <input type="text" class="form-control" id="authorId" name="authorId" placeholder="Enter author ID">
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


            <!-- Button trigger modal is in the above table-->
            <!-- Modal -->
            <!-- Edit Article -->
            <div class="modal fade" id="editArticle" tabindex="-1" aria-labelledby="editArticleModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editArticleModal">Chỉnh sửa bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form -->
                            <form action="index.php?page=admin&controller=articles&action=edit" method="post">
                                <!-- Article ID Field-->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Article ID</label>
                                    <input type="text" class="form-control" id="editArticleId" name="editArticleId" placeholder="Article ID" readonly>
                                </div>

                                <!-- Title Field -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="editTitle" name="editTitle" placeholder="Title">
                                </div>

                                <!-- Subtitle Field -->
                                <div class="mb-3">
                                    <label for="subtitle" class="form-label">Tiểu đề</label>
                                    <input type="text" class="form-control" id="editSubtitle" name="editSubtitle" placeholder="Enter subtitle">
                                </div>

                                <!-- Type Field -->
                                <div class="mb-3">
                                    <label for="type" class="form-label">Thể loại</label>
                                    <input type="text" class="form-control" id="editType" name="editType" placeholder="Enter type">
                                </div>

                                <!-- Author_id Field -->
                                <div class="mb-3">
                                    <label for="authorId" class="form-label">Mã tác giả</label>
                                    <input type="text" class="form-control" id="editAuthorId" name="editAuthorId" placeholder="Enter author ID">
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



            <!-- Button trigger delete modal is in the above table-->
            <!-- Modal -->
            <!-- Delete Article -->
            <div class="modal fade" id="deleteArticle" tabindex="-1" aria-labelledby="deleteArticleModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteArticleModal">Xóa bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?page=admin&controller=articles&action=delete" method="post">
                                <h2 class="text-danger">Bạn có chắc muốn xóa bài viết này không</h2>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Article ID</label>
                                    <input type="text" class="form-control" id="deleteArticleId" name="deleteArticleId" placeholder="Article ID" readonly>
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


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Get all the edit buttons with the class 'modalButton'
                    var editButtons = document.querySelectorAll('.modalButton');

                    // Add click event listeners to each modal button
                    editButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            // Get the article data and articleId from the data attributes
                            var articleId = button.getAttribute('data-articleid');

                            // Populate the modal with the article data
                            populateEditModal(articleId);
                        });
                    });

                    function populateEditModal(articleId) {
                        // Your code to populate the modal fields with articleData
                        document.getElementById('editArticleId').value = articleId;
                        document.getElementById('editContentId').value = articleId;
                        document.getElementById('deleteArticleId').value = articleId;

                        // Add more lines for other fields...

                        // Optionally, you can also update the form action URL if needed
                        // document.getElementById('editForm').action = 'your_updated_action_url';
                    }
                });
            </script>
        </div>


    </div>

</main>
<?php
require_once('views/admin/footer.php'); ?>