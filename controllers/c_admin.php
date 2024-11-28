<?php
include_once './viewsadmin/header.php';
    if (isset($_GET['view'])){
        switch ($_GET['view']) {
            case 'addpro':
                include_once './viewsadmin/addpro.php';
                break;
            
            case 'user':
                $user_list = $user->getAllUser();
                include_once './viewsadmin/user.php';
            case 'order':
                $order_list = $order->getAllOrder();
                include './viewsadmin/order.php';
                break;
            case 'user':
                $user_list = $user->getAllUser();
                include './viewsadmin/user.php';
                break;
        }
    }
    else{
            $Allcates = $cates->getAllCategories();
            include_once './viewsadmin/home.php';
    }
include_once './viewsadmin/footer.php';
?>