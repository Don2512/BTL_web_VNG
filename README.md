# BTL_web_VNG Học kì 231 BTL WEB đề tài công ty VNG
- Xây dựng web cho doanh nghiệp
- ngôn ngữ PHP/HTML/CSS/JS + database Mysql + boostrap cho css
## Mô tả Kiến trúc MVC
##### tầng đầu tiên là ***Views*** : có chức năng xử lí UI đầu vào là data của phần ***Controllers*** gửi lên
```php
<?php require_once("views/main/header.php") ?>
<h1>Tầng Views</h1>
<?php 
foreach ($data as $product) {
    echo "Product ID: " . $product->product_id . "<br>";
    echo "Category: " . $product->category . "<br>";
    echo "Date Added: " . $product->date_added . "<br>";
    echo "Price: $" . $product->price . "<br>";
    echo "<br>"; // Add a separator between products
}?>
<?php require_once("views/main/footer.php") ?>
```
- với ***$data*** được truyền từ phần ***Controllers*** lên nên kiểu dữ liệu sẽ quy định tại tầng ***Controllers***

##### tầng đầu 2 là ***Controllers*** dùng để lấy và gửi từ tầng ***models*** cho tầng ***view*** tầng này có chức năng xử lí data nếu cần để gửi lên ***view*** và cũng xác nhận dữ liệu khi gửi về lại ***models***
```php
<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');
class LayoutsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'views/main/layouts';
	}
	public function index()
	{
		$List_Product = Product::getAllProduct();
		$this->render('index', $List_Product);
	}
}
```
+ với ***$this->folder*** là tên folder đang giữ file cần được ***render*** ra
+ hàm ***render*** nhận vào tên file cần show ra ***view*** và theo đó là ***data***
+ chỉ có 1 hàm index nên khi ***router*** gọi đến ***action*** là ***index*** sẽ gọi hàm này và lấy dữ liệu từ ***database*** lên để truyền vào tầng ***view*** 
##### Tầng cuối cùng là ***models*** chỉ có chức năng ***query*** từ database và cập nhật database
+ ***$query = "CÂU TRUY VẤN";*** dùng để sử dụng gọi hàm ***DB::_Query*** để truy vấn và trả về ***table*** cần và sẽ được ***fetch_all*** sang kiểu mảng đê dễ xử lí.