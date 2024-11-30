<?php
include_once './viewsadmin/header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'addpro':
            $addpro_list = $prod->getAllProducts();
            $getcate = $cates->getAllCategories();
            if(isset($_POST['addprod'])) {
                $addnew = $prod->addProduct($_POST['image'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['cate'], $_POST['quantity']);
            }
            if(isset($_POST['Del'])) {
                $delprod = $prod->deleteProduct($_POST['idprod']);
            }
            include_once './viewsadmin/addpro.php';
            break;
        case 'order':
            $order_list = $order->getAllOrder();
            include './viewsadmin/order.php';
            break;
        case 'user':
            $user_list = $user->getAllUser();
            include './viewsadmin/user.php';
            break;
        case 'editcate':
            include_once './controllers/category_handler.php';
            break;
    }
} else {
    $Allcates = $cates->getAllCategories();
    include_once './viewsadmin/home.php';
}
include_once './viewsadmin/footer.php';
