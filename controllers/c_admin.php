<?php
    if (isset($_GET['view'])){
        switch ($_GET['view']) {
            case 'home':
                include_once './model/m_Database.php';
                include_once './model/m_sanpham.php';
                include_once '.views_admin/header.php';
                include_once '.views_admin/home.php';
                include_once '.views_admin/footer.php';
                break;
            default:
                include_once './model/m_Database.php';
                include_once './model/m_sanpham.php';
                include_once '.views_admin/header.php';
                include_once '.views_admin/home.php';
                include_once '.views_admin/footer.php';
        }
    }
?>