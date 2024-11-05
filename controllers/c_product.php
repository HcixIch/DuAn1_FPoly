<?php
include_once "models/m_Database.php";
if (isset($_GET['view']) && $_GET['view']) {
    switch ($_GET['view']) {
        case 'product':
            include_once "./views/t_header.php";
            include_once "./views/v_product_product.php";
            include_once "./views/t_footer.php";
            break;
        case 'cart':
            $i = 0;
            $sl = 0;
            $tong = 0;

            if (isset($_POST['mualuon'])) {
                $ten = $_POST['ten'];
                $hinh = $_POST['hinh'];
                $soluong = (int)$_POST['slg'];
                $gia = (float)$_POST['gia'];
                $id = $_POST['id'];

                $spgh = ['id' => $id, 'soluong' => $soluong, 'gia' => $gia, 'hinh' => $hinh, 'ten' => $ten];

                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = [];
                }

                // Check if the product already exists in the cart
                $found = 0;
                foreach ($_SESSION['giohang'] as &$sp) {
                    if ($sp['id'] == $id) {
                        $sp['soluong'] += $soluong;
                        $found = 1;
                        break;
                    }
                }
                if (!$found) {
                    $_SESSION['giohang'][] = $spgh;
                }
            }

            if (isset($_SESSION['giohang'])) {
                if (isset($_GET['dlall'])) {
                    unset($_SESSION['giohang']);
                    header("Location: index.php?ctrl=product&view=cart");
                    exit();
                }

                if (isset($_GET['idxoa'])) {
                    $idxoa = (int)$_GET['idxoa'];
                    if (isset($_SESSION['giohang'][$idxoa])) {
                        array_splice($_SESSION['giohang'], $idxoa, 1);
                    }
                    header("Location: index.php?ctrl=product&view=cart");
                    exit();
                }
            }
            $titlepage = "Giỏ Hàng";
            include_once "./view/t_header.php";
            include_once "./view/v_product_cart.php";
            include_once "./view/t_footer.php";
            break;
        case "ctsp":
            include_once "model/m_Database.php";
            include_once "model/m_sanpham.php";
            $sp = new Sanpham();
            $id = $_GET["id"];
            $spct = $sp->getSPbyId($id);
            $iddm = $spct[0]['iddm'];
            $splq = $sp->getAllSPByiddmkhac($iddm, $id);
            $titlepage = "Chi tiet san pham";
            include_once "./view/t_header.php";
            include_once "./view/v_product_ctsp.php";
            include_once "./view/t_footer.php";
            break;
        default:
            echo "Khong ton tai";
    }
} else {
    include_once "./views/t_header.php";
    include_once "./views/v_product_product.php";
    include_once "./views/t_footer.php";
}