<!DOCTYPE html>
<html lang="en">

<?php require_once("views/main/header.php") ?>

<div class="row">
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

        <?php foreach( $article->content as $item ){?>
            <h3 class="fw-bold mt-4 mb-4"><?php echo $item->title;?></h3>
            <p class="mt-4 mb-4"><?php echo $item->content;?></p>
            <img class="mt-5 mb-2 img-fluid rounded-5 border w-100" src="<?php echo $item->image;?>">
        <?php } ?>



        <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Comment</h1>
        <?php foreach( $comment as $item ){?>
        <div class="border border-primary">
            <h5><?php echo $item->name;echo" ";echo$item->time_commented; ?></h5>
            <p class="fw-bold mt-4 mb-4"><?php echo $item->content ?></p>
            <?php if ($item->name_id == 1) { ?>
                <button type="button" class="btn btn-danger" onclick="deleteComment(<?php echo $item->name_id; ?>, <?php echo $item->article_id; ?>, '<?php echo $item->time_commented; ?>')">Xóa</button>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="border border-primary">
            <form id="commentForm" method="post" action="">
                <input type="hidden" name="article_id" value="<?php echo $_GET['article_id']?>">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <input type="submit">
            </form>

        </div>
    </div>
    <div class="col-lg-4"  style="margin-top: 12% ;">
        <div>
            <h3 class="c-orange fw-bold mt-4 mb-4">Có thể bạn quan tâm</h3>
            <div class="border border-primary">
                <p><?php echo $newAarticle[0]->date ?></p>
                <h3 class="fw-bold mt-4 mb-4"><?php echo $newAarticle[0]->title ?></h3>
            </div>
            <div class="border border-primary">
                <p><?php echo $newAarticle[1]->date ?></p>
                <h3 class="fw-bold mt-4 mb-4"><?php echo $newAarticle[1]->title ?></h3>
            </div>
            <div class="border border-primary">
                <p><?php echo $newAarticle[2]->date ?></p>
                <h3 class="fw-bold mt-4 mb-4"><?php echo $newAarticle[2]->title ?></h3>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#commentForm').submit(function(event) {
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