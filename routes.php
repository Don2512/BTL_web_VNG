<?php

//* các file trong folder controller
$pages = array(
  'error' => ['errors'],
  'main' => ['layouts'],
  'admin' => []
);


//* các hàm trong file <name>_controller.php
$controllers = array(
  'errors' => ['index'],
  'layouts' => ['index']
); 

//* kiểm tra file đó có tồn tại hay không để truy cập
if ($page=='error' || !array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  require_once('error/error_404.php');
}
//* yêu cầu file đó -> khởi tạo class -> truy cập hàm
else
{

  include_once('controllers/' .$page ."/" . $controller . '_controller.php');

  $klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
  $controller = new $klass;
  $controller->$action(); 
}


