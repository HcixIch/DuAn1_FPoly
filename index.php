<?php
session_start();
ob_start();
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
        default:
            echo "Khong co trang";
            break;
    }
} else {
    include_once "./controllers/c_page.php";
}