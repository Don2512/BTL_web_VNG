

<?php require_once("views/main/header.php") ?>
    
<h1>Tầng Views</h1>

<?php 

foreach ($data as $product) {
    echo "Product ID: " . $product->product_id . "<br>";
    echo "Category: " . $product->category . "<br>";
    echo "Date Added: " . $product->date_added . "<br>";
    echo "Price: $" . $product->price . "<br>";
    echo "<br>"; // Add a separator between products
}


?>
<?php require_once("views/main/footer.php") ?>