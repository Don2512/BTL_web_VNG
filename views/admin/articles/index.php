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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Thêm bài viết
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm bài viết</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- Form -->
                                <form>
                                    <!-- Title Field -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter title">
                                    </div>

                                    <!-- Subtitle Field -->
                                    <div class="mb-3">
                                        <label for="subtitle" class="form-label">Tiểu đề</label>
                                        <input type="text" class="form-control" id="subtitle" placeholder="Enter subtitle">
                                    </div>

                                    <!-- Type Field -->
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Thể loại</label>
                                        <input type="text" class="form-control" id="type" placeholder="Enter type">
                                    </div>

                                    <!-- Content Field -->
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội dung</label>
                                        
                                        <!-- Container for dynamic content fields -->
                                        <div id="contentFieldsContainer">
                                            <div class="mb-3" id="contentFields">
                                                <label for="contentTitle" class="form-label">Tiêu đề nội dung</label>
                                                <input type="text" class="form-control" id="contentTitle" placeholder="Enter content title">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="contentText" class="form-label">Văn bản nội dung</label>
                                                <textarea class="form-control" id="contentText" rows="3" placeholder="Enter content text"></textarea>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="contentImage" class="form-label">Hình ảnh nội dung</label>
                                                <input type="file" class="form-control" id="contentImage">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <!-- Author_id Field -->
                                    <div class="mb-3">
                                        <label for="authorId" class="form-label">Mã tác giả</label>
                                        <input type="text" class="form-control" id="authorId" placeholder="Enter author ID">
                                    </div>

                                    <!-- Add more content fields -->
                                    <button type="button" class="btn btn-secondary" id="addContent">Add More Content</button>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

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
    foreach($article->content as $c_i_a) {
        $title = "<strong>". $c_i_a->title ."</strong><br>";
        $image = "<img src=" . $c_i_a->image . " class=\"img-fluid\" alt=\"pic-" . $counter . "\"><br>";
        $counter += 1;
        $text = "<p>".$c_i_a->content."</p><br>";

        $content_in_article = $content_in_article . $title . $image . $text . "</div>";
    }


    echo
"
<tr>
    <th scope=\"row\">". $article->id ."</th>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px;\">". $article->title ."</span></td>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px;\">". $article->subtitle ."</span></td>
    <td>". $article->type ."</td>
    <td>". $article->author_id ."</td>
    <td>". $article->date ."</td>
    <td><span class=\"d-inline-block text-truncate\" style=\"max-width: 150px; max-height:300px;\">". $content_in_article ."</span></td>  
    <td>
        <a href=\"index.php?page=admin&controller=articles&action=edit\" class=\"btn btn-warning btn-sm\"> 
            <i class=\"fa-solid fa-pen\"></i>
        </a>
        <a href=\"index.php?page=admin&controller=articles&action=delete\" class=\"btn btn-danger btn-sm\">
            <i class=\"fa-solid fa-trash\"></i>
        </a>
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
    <script>
$(document).ready(function() {
    // Counter for dynamic content fields
    var contentCounter = 1;

    // Add More Content button click event
    $('#addContent').click(function() {
        // Create a copy of the original content fields and increment IDs
        var newContent = $('#contentFields').clone();
        newContent.find('label').each(function() {
            var oldFor = $(this).attr('for');
            var newFor = oldFor + contentCounter;
            $(this).attr('for', newFor);

            var oldId = $(this).next().attr('id');
            var newId = oldId + contentCounter;
            $(this).next().attr('id', newId);
        });

        // Append the new content fields to the form
        $('#contentFieldsContainer').append(newContent);

        // Increment the counter for the next set of content fields
        contentCounter++;
    });
});
</script>
</main>
<?php
require_once('views/admin/footer.php'); ?>