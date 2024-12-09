<?php
include_once './viewsadmin/header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            $Allcates = $cates->getAllCategories();;
            include './viewsadmin/home.php';
            break;
        case 'editprod':
            if (isset($_GET['id'])) {
                $product = $prod->getProductsById($_GET['id']);
                $getcate = $cates->getAllCategories();
                if (isset($_POST['updateprod'])) {
                    $updateprod = $prod->updateProduct($_GET['id'], $_POST['image'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['cate'], $_POST['quantity']);
                }
            }
            include_once './viewsadmin/editprod.php';
            break;
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
            $order_list = $checkout->GetHistoryCheckout();
            if(isset($_POST['submit'])) {
                $checkout->UpdateStatus($_POST['id_checkout'], $_POST['status']);
            }
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
        case 'addcate':
            if (isset($_POST['add_category'])) {
                $name_category = $_POST['name_category'];
                if (!empty($name_category)) {
                    $cates->addCategory($name_category);
                    header("Location: ?ctrl=admin"); 
                    exit();
                } else {
                    echo "<script>alert('Tên danh mục không được để trống');</script>";
                }
            }
            include_once 'viewsadmin/addcate.php';
            break;
    }
} else {
    $productmen = $prod->getProductsByCategory(1,0);
    $productwomen = $prod->getProductsByCategory(2,0);
    $productaccessory = $prod->getProductsByCategory(3,0);
    $productsouvenirs = $prod->getProductsByCategory(4,0);
    include_once './viewsadmin/chart.php';
}
include_once './viewsadmin/footer.php';
