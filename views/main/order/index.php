<!DOCTYPE html>
<html lang="en">

<?php
$current_page = isset($_GET['numberpage']) ? $_GET['numberpage'] : 1;
$pre_page = ($current_page > 1) ? ($current_page - 1) : 1;
$next_page = ($current_page < $total_pages) ? ($current_page + 1) : $total_pages;
?>


<?php require_once("views/main/header.php") ?>




<!-- Hiển thị thanh pre, số trang và next -->

<div class="row w-100 m-0">

    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-md-10 col-12 w-100 ">
        <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">VẬT PHẨM & GAME</h1>
        <div class="row px-2">
            <?php foreach ($Product as $item) { ?>
                <div class="container col-6 col-md-4 mb-3">
                    <div class="card h-100">


                        <img src="<?php echo $item->image ?>" class="card-img-top" alt="...">
                        <form class="card-body" method="post" action="index.php?page=main&controller=order&action=myOrder">
                            <input type="hidden" name="id" value="<?php echo $item->id ?>">
                            <input type="hidden" name="image" value="<?php echo $item->image ?>">
                            <input type="hidden" name="category" value="<?php echo $item->category ?>">
                            <input type="hidden" name="name" value="<?php echo $item->name ?>">
                            <input type="hidden" name="price" value="<?php echo $item->price ?>">
                            <input type="hidden" name="number" value="1">

                            <p class="Category"><?php echo $item->category ?></p>
                            <h5 class="card-title c-black fs-20px fw-bold"><?php echo $item->name ?></h5>
                            <div class="row mt-3 mr-1">
                                <div class="col-lg-6 c-orange fs-20px fw-bold">
                                    $<?php echo $item->price ?>0
                                </div>
                                <div class="col-auto px-1 mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-circle btn-icon-left px-3 px-1 fs-4 fs-5 fs-6" name="mua">
                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            <?php } ?>


            <nav>
                <ul class="pagination justify-content-end ">
                    <?php if ($current_page > 1) : ?>
                        <li class="page-item mr-1">
                            <a class="page-link" href="index.php?page=main&controller=order&action=index&numberpage=<?php echo $pre_page; ?>" aria-label="Previous">
                                <span class="c-orange" aria-hidden="true">&laquo;</span>
                                <span class="sr-only c-orange">Previous</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                            <a class="page-link" href="index.php?page=main&controller=order&action=index&numberpage=<?php echo $i; ?>">
                                <span class="<?php echo ($i == $current_page) ? ' text-white' : 'c-orange'; ?>"><?php echo $i; ?></span>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages) : ?>
                        <li class="page-item mr-5">
                            <a class="page-link c-orange" href="index.php?page=main&controller=order&action=index&numberpage=<?php echo $next_page; ?>" aria-label="Next">
                                <span class="c-orange" aria-hidden="true">&raquo;</span>
                                <span class="sr-only c-orange">Next</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>


        </div>

    </div>







    <?php require_once("views/main/footer.php") ?>