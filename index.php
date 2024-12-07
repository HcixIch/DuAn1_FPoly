<?php
session_start();
ob_start();
include_once 'models/m_database.php';
include_once 'models/m_product.php';
include_once 'models/m_category.php';
include_once 'models/m_user.php';
include_once 'models/m_order.php';
include_once 'models/send_mail.php';
include_once 'models/m_checkout.php';
$prod = new Product();
$cates = new Category();
$user =  new User();
$order = new Order();
$checkout = new Checkout();
$wish = new Wishlist();
$checkoutall = $checkout->getCheckout();
$pro_all = $prod->getProductsByCondition('all', "");
$cate_all = $cates->getAllCategories();
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
            include_once "./controllers/c_admin.php";
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
