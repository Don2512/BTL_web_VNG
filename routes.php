<?php

//* các file trong folder controller
$pages = array(
  'error' => ['errors'],
  'main' => ['layouts', 'about', 'services', 'blog', 'archive', 'contact', 'login', 'register', 'edit', 'product', 'human', 'society', 'job'],
  'admin' => ['layouts', 'members', 'products', 'articles', 'comments']
);


//* các hàm trong file <name>_controller.php
$controllers = array(
  'errors' => ['index'],
  'layouts' => ['index'], // Bổ sung thêm các hàm trong controllers
  'members' => ['index', 'add', 'edit', 'delete'],
  'customers' => ['index', 'add', 'edit', 'delete'],
  'products' => ['index', 'add', 'edit', 'delete'],
  'articles' => ['index', 'add', 'edit', 'delete', 'getContent', 'getContentByTitle', 'addContent', 'editContent', 'deleteContent'],
  'comments' => ['index', 'hide', 'add', 'edit', 'delete'],
  'admin' => ['index', 'add', 'edit', 'delete'],
  'user' => ['index', 'add', 'editInfo', 'editPass', 'delete'],
  'company' => ['index', 'add', 'edit', 'delete'],
  'login' => ['index', 'check', 'logout'],
  'revenue' => ['index'],
  //Main controller
  'about' => ['index'],
  'blog' => ['index'],
  'blog' => ['index', 'comment', 'reply'],
  'services' => ['index'],
  'register' => ['index', 'submit', 'editInfo'],
  'login' => ['signin', 'signup', 'signin_action', 'signup_action', 'signout_action'],
  'product' => ['index', 'game', 'connection', 'digital', 'bill'],
  'human' => ['index'],
  'society' => ['index', 'article', 'addComment', "deleteComment", "getByType"],
  'order' => ['index', 'myOrder', 'payment'],
  'information' =>['index', 'purchaseHistory', 'updateCustomer'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.



//* kiểm tra file đó có tồn tại hay không để truy cập
if ($page == 'error' || !array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  require_once('error/error_404.php');
}
//* yêu cầu file đó -> khởi tạo class -> truy cập hàm
else {

  include_once('controllers/' . $page . "/" . $controller . '_controller.php');

  $klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
  $controller = new $klass;
  $controller->$action();
}
