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
            <table id="article-table" class="table table-hover">
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
    <td>" . date('h:i - d/m/Y', strtotime($article->date))  . "</td>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px; max-height:300px;\">" . $content_in_article . "</span></td>  
    <td>
        <div style=\"max-width:50px;\">
            <!-- Button to trigger edit article modal -->
            <a href=\"index.php?page=admin&controller=articles&action=edit\" class=\"btn btn-warning btn-sm mx-1 my-1 editArticleButton\" data-bs-toggle=\"modal\" 
            data-bs-target=\"#editArticle\" 
            data-article-id='" . $article->id . "' data-title='" . $article->title . "' data-subtitle='" .  $article->subtitle . "'
            data-category='" . $article->type . "' data-author-id='" . $article->author_id . "'
            >
                <i class=\"fa-solid fa-pen\"></i>
            </a>

            <!-- Button to trigger delete article modal -->
            <a href=\"index.php?page=admin&controller=articles&action=delete\" class=\"btn btn-danger btn-sm mx-1 my-1 deleteArticleButton\" data-bs-toggle=\"modal\" 
            data-bs-target=\"#deleteArticle\" data-article-id=" . $article->id . ">
                <i class=\"fa-solid fa-trash\"></i>
            </a>

                <a href=\"index.php?page=admin&controller=articles&action=getContent\" class=\"btn btn-warning btn-sm mx-1 my-1 getContentButton\" data-bs-toggle=\"modal\" 
                data-bs-target=\"#editContentModal\" data-article-id=" . $article->id . "> 
                <i class=\"fa-solid fa-file-pen\"></i>
            </a>

            <a href=\"index.php?page=admin&controller=articles&action=addContent\" class=\"btn btn-primary btn-sm mx-1 my-1 addContentButton\" data-bs-toggle=\"modal\" 
            data-bs-target=\"#addContent\" data-article-id=" . $article->id . "> 
                <i class=\"fa-solid fa-file-circle-plus\"></i>
            </a>
        </div>
    </td>
</tr>
";

                        $counter = $counter + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <!------------------------------------------------------------------------------------------>

    <!-- Add Article -->
    <div class="modal fade" id="addArticle" tabindex="-1" aria-labelledby="addArticleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white bg-primary">
                    <h5 class="modal-title fw-bold" id="addArticleModal">Thêm bài viết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="index.php?page=admin&controller=articles&action=add" method="post">
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <textarea class="form-control" id="addTitle" name="addTitle" rows="3" placeholder="Tiêu đề"></textarea>
                        </div>

                        <!-- Subtitle Field -->
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Tiểu đề</label>
                            <textarea class="form-control" id="addSubtitle" name="addSubtitle" rows="10" placeholder="Tiểu đề"></textarea>
                        </div>

                        <!-- Type Field -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Thể loại</label>
                            <input type="text" class="form-control" id="addType" name="addType" placeholder="Thể loại">
                        </div>

                        <!-- Author_id Field -->
                        <div class="mb-3">
                            <label for="authorId" class="form-label">Mã tác giả</label>
                            <input type="text" class="form-control" id="addAuthorId" name="addAuthorId" placeholder="Mã tác giả">
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

    <!-- Edit Article -->
    <div class="modal fade" id="editArticle" tabindex="-1" aria-labelledby="editArticleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title  fw-bold" id="editArticleModal">Chỉnh sửa bài viết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="index.php?page=admin&controller=articles&action=edit" method="post">
                        <!-- Article ID Field-->
                        <div class="mb-3">
                            <label for="editArticleId" class="form-label">Article ID</label>
                            <input type="text" class="form-control" id="editArticleId" name="editArticleId" placeholder="Article ID" readonly>
                        </div>

                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Tiêu đề</label>
                            <textarea class="form-control" id="editTitle" name="editTitle" rows="3" placeholder="Tiêu đề"></textarea>
                        </div>

                        <!-- Subtitle Field -->
                        <div class="mb-3">
                            <label for="editSubtitle" class="form-label">Tiểu đề</label>
                            <textarea class="form-control" id="editSubtitle" name="editSubtitle" rows="10" placeholder="Tiểu đề"></textarea>

                        </div>

                        <!-- Type Field -->
                        <div class="mb-3">
                            <label for="editType" class="form-label">Thể loại</label>
                            <input type="text" class="form-control" id="editType" name="editType" placeholder="Thể loại">
                        </div>

                        <!-- Author_id Field -->
                        <div class="mb-3">
                            <label for="editAuthorId" class="form-label">Mã tác giả</label>
                            <input type="text" class="form-control" id="editAuthorId" name="editAuthorId" placeholder="Mã tác giả">
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

    <!-- Delete Article -->
    <div class="modal fade" id="deleteArticle" tabindex="-1" aria-labelledby="deleteArticleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-danger">
                    <h5 class="modal-title fw-bold text-white" id="deleteArticleModal">Xóa bài viết</h5>
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

    <!-- Edit Content Modal -->
    <div class="modal fade" id="editContentModal" tabindex="-1" role="dialog" aria-labelledby="editContentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editContentModalLabel">Edit Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editContentForm">
                        <!-- Article ID Field (hidden) -->
                        <input type="hidden" id="articleIdField">

                        <!-- Dropdown List of Content Titles -->
                        <div class="form-group">
                            <label for="contentTitleSelect">Select Content Title</label>
                            <select class="form-control" id="contentTitleSelect"></select>
                        </div>

                        <!-- Content Title Field (readonly) -->
                        <div class="form-group">
                            <label for="contentTitle">Content Title</label>
                            <input type="text" class="form-control" id="contentTitle" readonly>
                        </div>

                        <!-- Content Text Field -->
                        <div class="form-group">
                            <label for="contentText">Content Text</label>
                            <textarea class="form-control" id="contentText" rows="3"></textarea>
                        </div>

                        <!-- Content Image Link Field -->
                        <div class="form-group">
                            <label for="contentImage">Content Image Link</label>
                            <input type="text" class="form-control" id="contentImage">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveContentChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Content Modal--deleting content -->


</main>

<?php
require_once('views/admin/footer.php'); ?>
<script>
    // Use datatables to implement simple sort, search
    $(document).ready(function() {
        $('#article-table').DataTable(

        );
    });

    // Add event to get article ID in add, edit, delete article and content
    document.addEventListener('DOMContentLoaded', function() {
        // Get all the edit buttons with the class 'editArticleButton'
        var editArticleButtons = document.querySelectorAll('.editArticleButton');

        // Get all the edit buttons with the class 'deleteArticleButton'
        var deleteArticleButtons = document.querySelectorAll('.deleteArticleButton');

        // Get all buttons with class 'getContentButton'
        var getContentButtons = document.querySelectorAll('.getContentButton');

        // Get all buttons with class 'addContentButton'
        var addContentButtons = document.querySelectorAll('.addContentButton');

        // Add click event listeners to editArticleButton
        editArticleButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the article data and articleId from the data attributes
                var articleId = button.getAttribute('data-article-id');
                var title = button.getAttribute('data-title');
                var subtitle = button.getAttribute('data-subtitle');
                var category = button.getAttribute('data-category');
                var authorId = button.getAttribute('data-author-id');
                // Populate the modal with the article data
                populateEditArticleModal(articleId, title, subtitle, category, authorId);
            });
        });

        // Add click event listeners to deleteArticleButton
        deleteArticleButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the article data and articleId from the data attributes
                var articleId = button.getAttribute('data-article-id');

                // Populate the modal with the article data
                populateDeleteArticleModal(articleId);
            });
        });

        getContentButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the article data and articleId from the data attributes
                var articleId = button.getAttribute('data-article-id');

                // Populate the GetContent modal with the article data
                populateGetContentModal(articleId);
            });
        });

        addContentButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the article data and articleId from the data attributes
                var articleId = button.getAttribute('data-article-id');

                // Populate the AddContent modal with the article data
                populateAddContentModal(articleId);
            });
        });


        function populateEditArticleModal(articleId, title, subtitle, category, authorId) {
            // Populate the modal fields with articleData
            document.getElementById('editArticleId').value = articleId;
            document.getElementById('editTitle').value = title;
            document.getElementById('editSubtitle').value = subtitle;
            document.getElementById('editType').value = category;
            document.getElementById('authorId').value = authorId;
        }

        function populateDeleteArticleModal(articleId) {
            document.getElementById('deleteArticleId').value = articleId;
        }

        function populateGetContentModal(articleId) {
            document.getElementById('getContentId').value = articleId;
        }

        function populateAddContentModal(articleId) {
            document.getElementById('addContentId').value = articleId;
        }


        // Function to fetch content data based on article ID and selected content ID
        function fetchContentData(articleId, selectedContentId) {
            // Assume you have an API endpoint to get content data
            var apiUrl = 'index.php?page=admin&controller=articles&action=getContentByTitle';
            // Make an AJAX request to fetch content data
            console.log(articleId, selectedContentId);
            $.ajax({
                type: 'POST',
                url: apiUrl,
                data: {
                    getContentId: articleId,
                    selectedContentId: selectedContentId
                },
                dataType: 'json',
                success: function(response) {
                    // Assuming response is a single content object
                    populateEditContentForm(response);
                },
                error: function(error) {
                    console.error('Error fetching content data:', error);
                }
            });
        }

        // Function to populate the form fields with content data
        function populateEditContentForm(content) {
            console.log(content);   
            $('#contentTitle').val(contentElement.title);
            $('#contentText').val(contentElement.content);
            $('#contentImage').val(contentElement.image);
        }

        // Event listener for change in content title selection
        $('#contentTitleSelect').change(function() {
            var selectedContentTitle = $(this).find(':selected').val();
            var articleId = $('#articleIdField').val();
            // Fetch and populate content data based on the selected content ID
            fetchContentData(articleId, selectedContentTitle);
        });

        // Event listener for opening the modal
        $('#editContentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var articleId = button.data('article-id');

            // Populate the hidden article ID field
            $('#articleIdField').val(articleId);

            // Assume you have an API endpoint to get content titles based on articleId
            var contentTitleSelect = $('#contentTitleSelect');

            // Make an AJAX request to fetch content titles
            $.ajax({
                type: 'POST',
                url: 'index.php?page=admin&controller=articles&action=getContent',
                data: {
                    getContentId: articleId
                },
                dataType: 'json',
                success: function(response) {
                    // Assuming response is an array of content objects
                    contentTitleSelect.empty(); // Clear existing options

                    // Populate dropdown with content titles
                    response.forEach(function(content) {
                        contentTitleSelect.append('<option value="' + content.title + '">' + content.title + '</option>');
                    });

                    // Trigger change event to load the first selected content
                    contentTitleSelect.trigger('change');
                },
                error: function(error) {
                    console.error('Error fetching content titles:', error);
                }
            });
        });

        // Event listener for saving content changes
        $('#saveContentChanges').click(function() {
            // Add logic to save the changes, e.g., another AJAX request
            // ...

            // Close the modal
            $('#editContentModal').modal('hide');
        });


    });
</script>