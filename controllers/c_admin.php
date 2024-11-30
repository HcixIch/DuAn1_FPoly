<?php
include_once './viewsadmin/header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'addpro':
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
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $category = $cates->getCategoryById($id);
                    if (isset($_POST['update_category'])) {
                        $name_category = $_POST['name_category'];
                        $cates->updateCategory($id, $name_category);
                        header("Location: ?ctrl=admin");
                        exit();
                    }
                }
                include './viewsadmin/editcate.php';
                break;
            
    }
} else {
    $Allcates = $cates->getAllCategories();
    include_once './viewsadmin/home.php';
}
include_once './viewsadmin/footer.php';
