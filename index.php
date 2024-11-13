<?php
session_start();
ob_start();
include_once 'models/m_database.php';
include_once 'models/m_product.php';
include_once 'models/m_category.php';
include_once 'models/m_cart.php';
include_once 'models/m_user.php';
$prod = new Product();
$cates = new Category();
$cart = new Cart();
$user =  new User();
$pro_all = $prod->getProductsByCondition('all', "");
$cate_all = $cates->getAllCategories();
$cart_all = $cart->getAllCartDetailItems(1);
if (isset($_GET['ctrl'])) {
    switch ($_GET['ctrl']) {
        case 'page':
            include_once "./controllers/c_page.php";
            break;
        case 'product':
            include_once "./controllers/c_product.php";
            break;
        case 'user':
            include_once "./controllers/c_user.php";
            break;
        case 'admin':
            include_once "./controller/c_admin.php";
            break;
        case 'cart':
            include_once "./controllers/c_cart.php";
            break;
        default:
            echo "Khong co trang";
            break;
    }
} else {
    include_once "./controllers/c_page.php";
}
