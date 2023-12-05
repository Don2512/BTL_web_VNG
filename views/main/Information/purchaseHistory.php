<!DOCTYPE html>
<html lang="en">


<?php require_once("views/main/header.php");?>
<?php
    $current_page = isset($_GET['numberpage']) ? $_GET['numberpage'] : 1;
    $pre_page = ($current_page > 1) ? ($current_page - 1) : 1;
    $next_page = ($current_page < $total_pages) ? ($current_page + 1) : $total_pages;
    $total = 0;
?>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-md-10 col-12">
        <h1 class="c-orange fs-30px fw-bold mt-4 mb-4">Lịch sử hàng của <?php echo $_SESSION['customer_name'] ?></h1>
        <table class="table table-striped">
            <thead class="table-dark" style="color:#FFFFFF; background-color: #ff6a1f;">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th class="d-none d-sm-table-cell">Giá</th>
                    <th class="d-none d-sm-table-cell">Số Lượng</th>
                    <th>Tổng tiền</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $id => $item) { ?>
                    <tr>
                        <td><?php echo $item->product_name; ?></td>
                        <td>
                            <img src="<?php echo $item->image ?>" class="img-thumbnail d-block mx-auto d-sm-none" style="max-width: 70px;">
                            <img src="<?php echo $item->image ?>" class="img-thumbnail d-none d-sm-block" style="max-width: 100px;">
                        </td>
                        <td class="d-none d-sm-table-cell">$<?php echo $item->price; ?>0</td>
                        <td class="d-none d-sm-table-cell"><?php echo $item->number; ?></td>
                        <td>$<?php echo $item->price * $item->number; ?>.000</td>
                        <?php $total += $item->price * $item->number;  ?>
                        <?php $dateTime = new DateTime($item->purchase_date);  ?>
                        <td><?php echo $dateTime->format('H:i:s d/m/Y'); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3" class="d-none d-md-table-cell"></td>
                    <td colspan="2" class="d-md-none"></td>
                    <td><strong>Tổng tiền:</strong></td>
                    <td><strong><?php echo $total; ?>.000</strong></td>
                </tr>
            </tbody>
        </table>

        <nav>
            <ul class="pagination justify-content-end ">
                <?php if ($current_page > 1): ?>
                    <li class="page-item mr-1">
                        <a class="page-link" href="index.php?page=main&controller=information&action=purchaseHistory&numberpage=<?php echo $pre_page; ?>" aria-label="Previous">
                            <span class="c-orange" aria-hidden="true">&laquo;</span>
                            <span class="sr-only c-orange">Previous</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?page=main&controller=information&action=purchaseHistory&numberpage=<?php echo $i; ?>">
                            <span class="<?php echo ($i == $current_page) ? ' text-white' : 'c-orange'; ?>"><?php echo $i; ?></span>
                        </a>
                    </li>
                <?php endfor; ?>

                <?php if ($current_page < $total_pages): ?>
                    <li class="page-item mr-5">
                        <a class="page-link c-orange" href="index.php?page=main&controller=information&action=purchaseHistory&numberpage=<?php echo $next_page; ?>" aria-label="Next">
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