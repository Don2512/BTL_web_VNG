<!DOCTYPE html>
<html lang="en">

<?php require_once("views/main/header.php") ?>
<div class="mwidth-200px mb-3">
    <div class="row w-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-7 col-md-9 col-12">

            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb mt-5 fs-12px">
                    <li class="breadcrumb-item"><a href="http://localhost/index.php" class="c-orange">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="http://localhost/index.php?page=main&controller=blog&action=index" class="c-orange">Tin tức</a></li>
                    <li class="breadcrumb-item"><a href="http://localhost/index.php?page=main&controller=blog&action=index" class="c-orange"><?php echo $article->type; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $article->title; ?></li>
                </ol>
            </nav>

            <h1 class="c-orange fs-30px fw-bold mt-4 mb-4"><?php echo $article->title; ?></h1>
            <p><?php echo $article->date; ?></p>
            <p><?php echo $article->contentTitle; ?></p>

            <?php foreach ($article->content as $item) { ?>
                <h3 class="fw-bold mt-4 mb-4"><?php echo $item->title; ?></h3>
                <p class="mt-4 mb-4"><?php echo $item->content; ?></p>
                <img class="mt-5 mb-2 img-fluid rounded-5 border w-100" src="<?php echo $item->image; ?>">
            <?php } ?>



            <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Comment</h1>
            <?php foreach ($comment as $item) { ?>
                <div class="border-c-gray p-4 mb-3 position-relative">
                    <div class="row">
                        <div class="col">
                            <h5>
                                <?php
                                echo $item->name; ?></h5>
                        </div>
                        <div class="col-auto">
                            <?php if ($item->name_id == (isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : 0)) { ?>
                                <div class="hover-bg-red c-black hover-c-white border-c-red px-2 py-1 hover-mouse" onclick="deleteComment(<?php echo $item->name_id; ?>, <?php echo $item->article_id; ?>, '<?php echo $item->time_commented; ?>')">Xóa</div>

                            <?php } ?>
                        </div>
                    </div>

                    <h6 class="c-gray">
                        <?php
                        echo $item->time_commented; ?></h6>
                    <p class="mt-4 mb-4"><?php echo $item->content ?></p>

                </div>
            <?php } ?>
            <div class="border-c-gray border-3">
                <form id="commentForm" method="post" action="">
                    <input type="hidden" name="article_id" value="<?php echo $_GET['article_id'] ?>">
                    <input type="hidden" name="customer_id" value="<?php echo isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : "" ?>">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label p-2 fw-bold mx-3 rounded-0 c-gray" onclick=test()>Bình luận</label>
                        <!-- <textarea class="form-control" name="content" rows="3"></textarea> -->
                        <div class="container w-100 px-3">
                            <div class="textareaElement w-100 px-3 py-2" contenteditable id="contentArea"></div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto"><button type="submit" class="mb-3 me-3 border-c-gray bg-white-100 c-gray hover-bg-gray hover-c-white fw-bold border-2">Gửi bình luận</button></div>
                    </div>

                </form>

            </div>
        </div>
        <div class="col-lg-4" style="margin-top: 12% ;">
            <div>
                <h3 class="c-orange fw-bold mt-4 mb-4">Có thể bạn quan tâm</h3>
                <div class="border-c-orange p-3 border-3 mb-3">
                    <a class="text-decoration-none c-black hover-c-orange" href="?page=main&controller=society&action=article&article_id=<?php echo $newAarticle[0]->id ?>">
                        <p><?php echo $newAarticle[0]->date ?></p>
                        <h3 class="fw-bold mt-4 mb-4"><?php echo $newAarticle[0]->title ?></h3>
                    </a>
                </div>
                <div class="border-c-orange p-3 border-3 mb-3">
                    <a class="text-decoration-none c-black hover-c-orange" href="?page=main&controller=society&action=article&article_id=<?php echo $newAarticle[1]->id ?>">
                        <p><?php echo $newAarticle[1]->date ?></p>
                        <h3 class="fw-bold mt-4 mb-4"><?php echo $newAarticle[1]->title ?></h3>
                    </a>
                </div>
                <div class="border-c-orange p-3 border-3 mb-3">
                    <a class="text-decoration-none c-black hover-c-orange" href="?page=main&controller=society&action=article&article_id=<?php echo $newAarticle[2]->id ?>">
                        <p><?php echo $newAarticle[2]->date ?></p>
                        <h3 class="fw-bold mt-4 mb-4"><?php echo $newAarticle[2]->title ?></h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleOption() {
        console.log(1)
        $("#btn_del").toggleClass('d-none')
    }
    $(document).ready(function() {
        $('#commentForm').submit(function(event) {
            var contentValue = $("#contentArea").text();
            $("<input />").attr("type", "hidden")
                .attr("name", "content")
                .attr("value", contentValue)
                .appendTo("#commentForm");

            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'http://localhost/index.php?page=main&controller=society&action=addComment',
                data: formData,
                success: function(response) {
                    // Xử lý phản hồi từ server ở đây (nếu cần)
                    console.log(response);
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

<script>
    function deleteComment(customerId, articleId, timeCommented) {
        console.log(customerId, articleId, timeCommented);
        // Xác nhận việc xóa
        fetch('http://localhost/index.php?page=main&controller=society&action=deleteComment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    customer_id: customerId,
                    article_id: articleId,
                    time_commented: timeCommented
                })
            })
            .then(response => response.json())
            .then(data => {
                // Xử lý phản hồi từ server (nếu cần)
                console.log(data);

                // Load lại trang sau khi xóa
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

<?php require_once("views/main/footer.php") ?>