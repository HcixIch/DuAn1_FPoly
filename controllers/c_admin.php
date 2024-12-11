<?php
include_once './viewsadmin/header.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            $Allcates = $cates->getAllCategories();
            include './viewsadmin/home.php';
            break;
        case 'editprod':
            if (isset($_GET['id'])) {
                $product = $prod->getProductsById($_GET['id']);
                $getcate = $cates->getAllCategories();
                if (isset($_POST['updateprod'])) {
                    $updateprod = $prod->updateProduct($_GET['id'], $_POST['image'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['cate'], $_POST['quantity']);
                    header("Location:?ctrl=admin&view=addprod");
                    exit();
                }
            }
            include_once './viewsadmin/editprod.php';
            break;
        case 'prods':
            $addpro_list = $prod->getAllProducts();
            if(isset($_POST['Del'])) {
                $delprod = $prod->deleteProduct($_POST['idprod']);
                header("Location:?ctrl=admin&view=prods");
                exit();
            }
            include_once './viewsadmin/prods.php';
            break;
        case 'addprods':
            $getcate = $cates->getAllCategories();
            if (isset($_POST['addprod'])) {
                $addnew = $prod->addProduct($_POST['image'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['cate'], $_POST['quantity']);
                header("Location: ?ctrl=admin&view=addpro");
            }
            if (isset($_POST['Del'])) {
                $delprod = $prod->deleteProduct($_POST['idprod']);
                header("Location: ?ctrl=admin&view=addpro");
            }
            include_once './viewsadmin/addpro.php';
            break;
        case 'order':
            $order_list = $checkout->GetHistoryCheckout();
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_checkout']) && isset($_POST['new_status'])) {
                $id_checkout = intval($_POST['id_checkout']);
                $new_status = intval($_POST['new_status']);

                // Cập nhật trạng thái mới vào cơ sở dữ liệu
                $update_stmt = $conn->prepare("UPDATE checkout SET status = ? WHERE id_checkout = ?");
                $update_stmt->bind_param("ii", $new_status, $id_checkout);

                if ($update_stmt->execute()) {
                    echo json_encode(["success" => true, "new_status" => $new_status]);
                } else {
                    echo json_encode(["success" => false, "message" => "Không thể cập nhật trạng thái."]);
                }
                header("Location:?ctrl=admin&view=order");
                exit;
            }
            include './viewsadmin/order.php';
            break;
        case 'user':
            $user_list = $user->getAllUser();
            if(isset($_POST['submit'])){              
                $UpUser = $user->updateRole($_POST['id'], 1);
                header("Location:?ctrl=admin&view=user");
                exit();
            }
            if(isset($_POST['Del'])){              
                $UpUser = $user->resetRole($_POST['id'], 0);
                header("Location:?ctrl=admin&view=user");
                exit();
            }
            include './viewsadmin/user.php';
            break;
        case 'editcate':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = $cates->getCategoryById($id);
                if (isset($_POST['update_category'])) {
                    $name_category = $_POST['name_category'];
                    $cates->updateCategory($id, $name_category);
                    header("Location:?ctrl=admin&view=home");
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
                    header("Location:?ctrl=admin&view=home"); 
                    exit();
                } else {
                    echo "<script>alert('Tên danh mục không được để trống');</script>";
                }
            }
            include_once 'viewsadmin/addcate.php';
            break;
    }
} else {
    $productmen = $prod->getProductsByCategory(1, 0);
    $productwomen = $prod->getProductsByCategory(2, 0);
    $productaccessory = $prod->getProductsByCategory(3, 0);
    $productsouvenirs = $prod->getProductsByCategory(4, 0);

    $order_list = $checkout->GetHistoryCheckout();

    $monthlySales = $checkout->getMonthlySales();
    $labels = [];
    $data = [];
    foreach ($monthlySales as $sale) {
        $labels[] = $sale['month'];
        $data[] = $sale['total'];
    };
    $topwishlist = $wish->getTop5WishlistProducts();
    include_once './viewsadmin/chart.php';
}
include_once './viewsadmin/footer.php';
